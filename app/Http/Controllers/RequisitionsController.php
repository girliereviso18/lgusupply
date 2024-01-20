<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller; // Make sure to import the correct base controller
use App\Models\Department;
use Illuminate\Http\Request;
use App\Models\Requisition;
use App\Models\Requisitions_item;
use App\Models\Item;
use App\Models\Supply;
use App\Models\Report;
use Auth;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;


class RequisitionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //$requisitions = Requisition::get();
        $requisitions = Requisition::get();

        return view('Requisitions.index', ['requisitions' => $requisitions]);
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
        $requisition->requested_by = $request->requested_by;
        $requisition->requested_printed_name = $request->requested_printed_name;
        $requisition->requested_designation = $request->requested_designation;
        $requisition->requested_date = $request->date;

        // Add information for "Issued by:"
        $userId = session('user_id');
        $user = User::where('id', $userId)->first();
        echo json_encode($user);
        $requisition->issued_by = $userId;
        $requisition->issued_printed_name = $user->name;
        $requisition->issued_designation = $user->department_id;
        $requisition->issued_date = $request->date;

        // Add information for "Received by:"
        $requisition->received_by = $request->received_by;
        $requisition->received_printed_name = $request->received_printed_name;
        $requisition->received_designation = $request->received_designation;
        $requisition->received_date = $request->date;
        $requisition->status = $request->status;


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
                    Report::where('department', $request->department)
                    ->where('item',$itemId)->decrement('balance', $qty);
                    
                }
            }


            return redirect()->route('admin.requisitions.pending')->with('success', 'Successfully added!');
        } else {
            return redirect()->route('admin.requisitions.pending')->with('error', 'Failed to create requisition.');
        }
    }

    public function addrequisitions()
    {
        $supplies = Supply::with('item')->get();
        $units = Unit::get();
        $items = Item::get();
        $department = Department::get();
        $users = User::get();
        return view('Requisitions.Store.index',[
            'supplies'=> $supplies,
            'units' => $units,
            'items' => $items,
            'departments' => $department,
            'users' => $users
        ]);
    }

    public function editrequisitions(Request $request)
    {
        $requisition = Requisition::find($request->id);
        $requisition_items = Requisitions_item::where('requisitions_id', $request->id)->get();

        $supplies = Supply::with('item')->get();

        return view('Requisitions.Edit.index', [
            'requisition' => $requisition,
            'requisition_items' => $requisition_items,
            'supply' => $supplies
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

         // Add information for "Requested by:"
        $requisition->requested_by = $request->requested_by;
        $requisition->requested_printed_name = $request->requested_printed_name;
        $requisition->requested_designation = $request->requested_designation;

        // Add information for "Received by:"
        $requisition->received_by = $request->received_by;
        $requisition->received_printed_name = $request->received_printed_name;
        $requisition->received_designation = $request->received_designation;

        // //echo json_encode($requisition);

        if ($requisition->save()) {

            // $deleterequisition_item = Requisitions_item::where('requisition_id',$request->id);
            // if ($deleterequisition_item) {
            //     $deleterequisition_item->delete();
            // }
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
                        $q = Requisitions_item::where('id', $item_id)->value('qty');
                        if($q > $qty){
                            $res = $q - $qty;
                            Report::where('department', $request->requested_designation)
                            ->where('item',$itemId)->increment('balance', $res);
                        }else{
                            $res = $qty - $q;
                            Report::where('department', $request->requested_designation)
                            ->where('item',$itemId)->decrement('balance', $res);
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
                        Report::where('department', $request->requested_designation)
                        ->where('item',$itemId)->decrement('balance', $qty);
                    }
                }
            }

            return redirect()->route('admin.requisitions.pending')->with('success', 'Updated!');
        } else {
            return redirect()->route('admin.requisitions.pending')->with('error', 'Failed to update requisition.');
        }
}

public function deleterequisitions(Request $request)
{
    $requisition = Requisition::find($request->id);
    
    $idDepartment = User::where('id',$requisition->requested_by)->value('department_id');
    $requisition_items = Requisitions_item::where('requisitions_id',$request->id)->get();

    foreach($requisition_items as $item){
        Report::where('department',$idDepartment)->where('item',$item->item_id)->increment('balance', $item->qty);
    }

    $deleteItem = Requisitions_item::find($request->id);
    if ($deleteItem) {
        $deleteItem->delete();
    }
    $requisition->delete();
}
public function deleteRequisitionItem(Request $request)
{
    $requisition = Requisition::find($request->id);

    $idDepartment = User::where('id',$requisition->requested_by)->value('department_id');
    $requisition_items = Requisitions_item::where('requisitions_id',$request->id)->get();

    foreach($requisition_items as $item){
        Report::where('department',$idDepartment)->where('item',$item->item_id)->increment('balance', $item->qty);
    }
    
    $deleteItem = Requisitions_item::find($request->id);
    if ($deleteItem) {
        $deleteItem->delete();
    }
}
     public function viewrequisitions(Request $request)
    {
        $requisition = Requisition::where('id', $request->id)->first();
        $requisitionitems = Requisitions_item::where('requisitions_id', $request->id)->get();

        foreach($requisitionitems as $val){
            $unit_name = Unit::where('id', $val->unit_id)->value('unit_name');
            $val->unit_id = $unit_name;
            $item_name = Item::where('id', $val->item_id)->value('items_name');
            $val->item_id = $item_name;
        }
        return view('Requisitions.view', [
            'requisition' => $requisition,
            'requisitionitems' => $requisitionitems
        ]);
    }
    
    public function requisitionsprint(Request $request)
    {
        $requisition = Requisition::where('id', $request->id)->first();
        $requisitionitems = Requisitions_item::where('requisitions_id', $request->id)->get();

        if($requisition){
            $dep = Department::where('id', $requisition->received_designation)->value('department_user');
            $requisition->received_designation = $dep;
            $requisition->requested_date = Carbon::parse($requisition->received_date)->format('Y-m-d');
            $requisition->issued_date = Carbon::parse($requisition->issued_date)->format('Y-m-d');
            $requisition->received_date = Carbon::parse($requisition->received_date)->format('Y-m-d');

        }

        foreach($requisitionitems as $val){
            $unit_name = Unit::where('id', $val->unit_id)->value('unit_name');
            $val->unit_id = $unit_name;
            $item_name = Item::where('id', $val->item_id)->value('items_name');
            $val->item_id = $item_name;
        }
            
        return view('Requisitions.print.index', [
            'requisition' => $requisition,
            'requisitionitems' => $requisitionitems
        ]);
    }
    public function show($id) {
        $requisition = Requisition::find($id);
        $requisitionItems = $requisition->requisitionItems; 
        $dep = Department::where('id', $requisition->received_designation);
        $requisition->received_designation = $dep;

        return view('Requisitions.view', ['requisition' => $requisition, 'requisitionItems' => $requisitionItems]);


    }
    public function approve(Request $request)
    {
        $requisition = Requisition::find($request->id);

        $requisition->approved_printed_name = 'Noel E. Alinsub';
        $requisition->approved_date = $request->current_date;
        $requisition->status = 'approved';
        

        if($requisition->issued_by == null){
            // Add information for "Issued by:"
            $userId = session('user_id');
            $user = User::where('id', $userId)->first();
            $requisition->issued_by = $userId;
            $requisition->issued_printed_name = $user->name;
            $requisition->issued_designation = $user->department_id;
            $requisition->issued_date = $request->current_date;
        }

        if($requisition->received_by == null){
            $requisition->received_by = 0;
            $requisition->received_printed_name = $request->received_printed_name;
            $requisition->received_designation = $request->received_designation;
            $requisition->received_date = $request->current_date;
        }
        $requisition->save();
    }
    public function pendingRequisition(){
        $requisitions = Requisition::where('status', 'pending')->orderBy('created_at', 'desc')->get();
        //echo json_encode($requisitions);
         return view('Requisitions/pending.index', ['requisitions' => $requisitions]);
    }
    public function approvedRequisition(){
        $requisitions = Requisition::where('status', 'approved')->get();

        return view('Requisitions/approved.index', ['requisitions' => $requisitions]);
    }

    //disapprovedRequisition
   
    public function disapprovedRequisition(){
        $requisitions = Requisition::where('status', 'disapproved')->get();

        return view('Requisitions/disapproved.index', ['requisitions' => $requisitions]);
    }

    public function disapprove(Request $request) {

        $requisition = Requisition::find($request->id);
        
        $requisition->status = 'disapproved';
        $requisition->save();
        
        $idDepartment = User::where('id',$requisition->requested_by)->value('department_id');
        $requisition_items = Requisitions_item::where('requisitions_id',$request->id)->get();

        foreach($requisition_items as $item){
            Report::where('department',$idDepartment)->where('item',$item->item_id)->increment('balance', $item->qty);
        }
        //return redirect()->route('admin.requisitions.pending')->with('success', 'Successfully added!');
    }
    public function reports(Request $request){
        $Items = Report::where('department', $request->id)->get();
        return response()->json(['items' => $Items]);
    }
    public function markAsRead(){
        $requisitions = Requisition::where('is_new', 1)->get();
        foreach ($requisitions as $requisition) {
            $requisition->is_new = 0;
            $requisition->save();
        }
    }

}