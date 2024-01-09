<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; // Make sure to import the correct base controller
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Requisition;
use App\Models\Requisitions_item;
use App\Models\Item;
use App\Models\Supply;
use App\Models\Unit;
use App\Models\Report;
use App\Models\User;
use Auth;

class RequisitionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $requisitions = Requisition::where('requested_by', session('user_id'))->get();

        return view('Employee.requisition.index', ['requisitions' => $requisitions]);
    }


    public function store(Request $request)
    {

        // First, save the Requisition record
        $requisition = new Requisition();
        $requisition->entity_name = $request->entity_name;
        $requisition->fund_cluster = $request->fund_cluster;
        $requisition->division_id = $request->division_id;
        $requisition->rc_code = $request->rc_code;
        $requisition->office_id = $request->office_id;
        $requisition->purpose = $request->purpose;

         // Add information for "Requested by:"
        $requisition->requested_by = session('user_id');
        $username = User::where('id',session('user_id'))->value('name');
        $requisition->requested_printed_name = $username;
        $requisition->requested_designation = session('department');
        $requisition->requested_date = $request->date;

        // Add information for "Issued by:"
        
        $requisition->status = "pending";
        
        if ($requisition->save()) {

            $requisitions = array($request->input('requisitions'));

            foreach ($requisitions as $row) {
                foreach ($row as $value) {
                    $stockNo = $value[0];
                    $unitId = $value[1];
                    $itemId = $value[2];
                    $qty = $value[3];
                    $available = $value[4];
                    $remarks = $value[5];

                    $requisitions_items = new Requisitions_item();

                    $requisitions_items->requisitions_id = $requisition->id;
                    $requisitions_items->stock_no = $stockNo;
                    $requisitions_items->unit_id = $unitId;
                    $requisitions_items->item_id = $itemId;
                    $requisitions_items->qty = $qty;
                    $requisitions_items->isavailable = $available;
                    $requisitions_items->remarks = $remarks;
                    
                    $requisitions_items->save();

                    //update the Available of the items
                    $qnty = Report::where('item', $itemId)->where('department',session('department'))->value('balance');

                    if ($qnty !== null || $qnty !== 0) {
                        $reports = Report::where('item', $itemId)->where('department',session('department'))->first();
                        if ($reports) {
                            $res = $qnty - $qty;
                            $reports->balance = $res;
                            $reports->save();
                        } else {
                            echo "No matching supply record found for item_id: $itemId";
                        }
                    }
                }
            }
            return redirect()->route('employee.requisition.pending')->with('success', 'Successfully added!');
        } else {
            return redirect()->route('employee.requisition.add')->with('error', 'Failed to create requisition.');
        }
}

    public function addrequisitions()
    {
        $username = User::where('id', session('user_id'))->value('name');
        $supplies = Supply::with('item')->get();
        $units = Unit::get();
        $reports = Report::where('department', session('department'))->get();
        $department = Department::where('id',session('department'))->value('department_user');

        //echo json_encode($department);
        return view('Employee.requisition.add',[
            'supplies'=> $supplies,
            'units' => $units,
            'reports' => $reports,
            'username' => $username,
            'department' => $department
        ]);
    }

    public function editrequisitions(Request $request)
    {
        $requisition = Requisition::find($request->id);
        $requisition_items = Requisitions_item::where('requisitions_id', $request->id)->get();
        $reports = Report::where('department', session('department'))->get();

        $supplies = Supply::with('item')->get();

        return view('Employee.requisition.Edit.index', [
            'requisition' => $requisition,
            'requisition_items' => $requisition_items,
            'supply' => $supplies,
            'reports' => $reports
        ]);
    }

  public function updaterequisitions(Request $request)
{
        $requisition = Requisition::find($request->id);
        
        $requisition->entity_name = $request->entity_name;
        $requisition->fund_cluster = $request->fund_cluster;
        $requisition->division_id = $request->division_id;
        $requisition->rc_code = $request->rc_code;
        $requisition->office_id = $request->office_id;
        $requisition->purpose = $request->purpose;


        if ($requisition->save()) {
            // Update requisitions_items
            $requisitions = array($request->input('requisitions'));

            foreach ($requisitions as $row) {
                foreach ($row as $value) {
                    $stockNo = $value[0];
                    $unitId = $value[1];
                    $itemId = $value[2];
                    $qty = $value[3];
                    $available = $value[4];
                    $remarks = $value[5];
                    $item_id = $value[6];

                    echo $remarks;
                    if($item_id != ''){
                        //update the Available of the items
                        $qnty = Report::where('item', $itemId)->where('department',session('department'))->value('balance');

                        $q = Requisitions_item::where('id', $item_id)->value('qty');
                        if ($qnty !== null || $qnty !== 0) {
                            $reports = Report::where('item', $itemId)->where('department',session('department'))->first();
                            if ($reports) {
                                $sum = $qnty+$q;
                                $res = $sum - $qty;
                                $reports->balance = $res;
                                $reports->save();
                            } else {
                                echo "No matching supply record found for item_id: $itemId";
                            }
                        }
                        Requisitions_item::where('id', $item_id)->update([
                            'stock_no' => $stockNo,
                            'unit_id' => $unitId,
                            'item_id' => $itemId,
                            'qty' => $qty,
                            'isavailable' => $available,
                            'remarks' => $remarks,
                        ]);
                        
                    }else{
                        $requisitions_items = new Requisitions_item();

                        $requisitions_items->requisitions_id = $requisition->id;
                        $requisitions_items->stock_no = $stockNo;
                        $requisitions_items->unit_id = $unitId;
                        $requisitions_items->item_id = $itemId;
                        $requisitions_items->qty = $qty;
                        $requisitions_items->isavailable = $available;
                        $requisitions_items->remarks = $remarks;
                        
                        $requisitions_items->save();
    
                        //update the Available of the items
                        $qnty = Report::where('item', $itemId)->where('department',session('department'))->value('balance');
    
                        if ($qnty !== null || $qnty !== 0) {
                            $reports = Report::where('item', $itemId)->where('department',session('department'))->first();

                            if ($reports) {
                                $res = $qnty - $qty;
                                $reports->blance = $res;
                                $reports->save();
                            } else {
                                echo "No matching supply record found for item_id: $itemId";
                            }
                        }
                    }
                }
            }

        return redirect()->route('employee.requisition.pending')->with('success', 'Updated!');
    } else {
        return redirect()->route('employee.requisition.index')->with('error', 'Failed to update requisition.');
    }
}

public function deleterequisitions(Request $request)
{
    $deleterequisition = Requisition::find($request->id);

    if ($deleterequisition) {
        $deleterequisition->delete();
        return redirect()->back()->with('success', 'Deleted!');
    } else {
        return redirect()->back()->with('error', 'Requisition not found.');
    }
}

public function deleteRequisitionItem(Request $request)
{
    $requisition_item = Requisitions_item::find($request->id);

    if ($requisition_item) {
        $qty = $requisition_item->qty;
        $item_id = $requisition_item->item_id;
        // Use the increment method to add $qty to the current value of 'qty' in the Supply table
        Report::where('item', $item_id)->increment('balance', $qty);
    }
    
    $deleteItem = Requisitions_item::find($request->id);
    if ($deleteItem) {
        $deleteItem->delete();
    }
}

     public function viewrequisitions(Request $request)
    {
        $requisition = Requisition::where('id', $request->id)->first();
            
        return view('Employee.requisition.view', [
            'requisition' => $requisition
        ]);
    }
    
    public function requisitionsprint(Request $request)
    {
        $requisition = Requisition::where('id', $request->id)->first();
        $requisitionitems = Requisitions_item::where('id', $request->id)->get();
            
        return view('Employee.requisitions.print.index', [
            'requisition' => $requisition,
            'requisitionitems' => $requisitionitems
        ]);
    }
    public function show($id) {
        $requisition = Requisition::find($id);
        $requisitionItems = $requisition->requisitionItems; 

        return view('Employee.requisitions.view', ['requisition' => $requisition, 'requisitionItems' => $requisitionItems]);


    }
    public function pending(){ 
        $requisitions = Requisition::where('requested_by', session('user_id'))
                                    ->where('status', 'pending')
                                    ->get();

        return view('Employee/requisition.pending', ['requisitions' => $requisitions]);
    }
    public function approved() {

        $requisitions = Requisition::where('status', 'approved')
                                    ->where('requested_by', session('user_id'))
                                    ->get();

        return view('Employee/requisition.approved', ['requisitions' => $requisitions]);
    }
    public function disapproved() {

        $requisitions = Requisition::where('status', 'disapproved')
                                    ->where('requested_by', session('user_id'))
                                    ->get();

        return view('Employee/requisition.disapproved', ['requisitions' => $requisitions]);
    }

}