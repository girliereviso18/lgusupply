<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller; // Make sure to import the correct base controller
use Illuminate\Http\Request;
use App\Models\Requisition;
use App\Models\Requisitions_item;

class RequisitionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $requisitions = Requisition::get();

        return view('Employee.requisition.index', ['requisitions' => $requisitions]);
    }


    public function store(Request $request)
    {

        // First, save the Requisition record
        $requisition = new Requisition();
        $requisition->user_id = session('user_id');
        $requisition->entity_name = $request->entity_name;
        $requisition->fund_cluster = $request->fund_cluster;
        $requisition->division_id = $request->division_id;
        $requisition->rc_code = $request->rc_code;
        $requisition->office_id = $request->office_id;
        $requisition->purpose = $request->purpose;
        $requisition->requested_by = $request->requested_by;
        $requisition->approved_by = $request->approved_by;
        $requisition->issued_by = $request->issued_by;
        $requisition->received_by = $request->received_by;
         $requisition->status = $request->status;

         // Add information for "Requested by:"
        $requisition->requested_printed_name = $request->requested_printed_name;
        $requisition->requested_designation = $request->requested_designation;
        $requisition->requested_date = $request->requested_date;

        // Add information for "Approved by:"
        $requisition->approved_printed_name = $request->approved_printed_name;
        $requisition->approved_designation = $request->approved_designation;
        $requisition->approved_date = $request->approved_date;

        // Add information for "Issued by:"
        $requisition->issued_printed_name = $request->issued_printed_name;
        $requisition->issued_designation = $request->issued_designation;
        $requisition->issued_date = $request->issued_date;

        // Add information for "Received by:"
        $requisition->received_printed_name = $request->received_printed_name;
        $requisition->received_designation = $request->received_designation;
        $requisition->received_date = $request->received_date;

        if ($requisition->save()) {

            $length = $request->index;
            for($i = 0; $i <= $length; $i++){
                $requisitions_items = new Requisitions_item();
    
                $requisitions_items->requisitions_id = $requisition->id;
                $requisitions_items->stock_no = $request->stock_no[$i];
                $requisitions_items->unit_id = $request->unit_id[$i];
                $requisitions_items->item_id = $request->item_id[$i];
                $requisitions_items->qty = $request->qty[$i];
                $requisitions_items->isavailable = $request->isAvailable[$i];;
                $requisitions_items->issued_qty = $request->issued_qty[$i];;
                $requisitions_items->remarks = $request->remarks[$i];
    
                $requisitions_items->save();
            }
            return redirect()->route('employee.requisition.index')->with('success', 'Successfully added!');
        } else {
            return redirect()->route('employee.requisition.add')->with('error', 'Failed to create requisition.');
        }
}

    public function addrequisitions()
    {
        return view('Employee.requisition.add');
    }

    public function editrequisitions(Request $request)
    {
        $requisition = Requisition::find($request->id);
        $requisition_items = Requisitions_item::where('requisitions_id', $request->id)
                                            ->get();

        return view('Employee.requisition.Edit.index', [
            'requisition' => $requisition,
            'requisition_items' => $requisition_items
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
            //  resquestedby

            $requisition->requested_by = $request->requested_by;
            $requisition->requested_signature= $request->requested_signature;
            $requisition->requested_printed_name = $request->requested_printed_name;
            $requisition->requested_designation= $request->requested_designation;
            $requisition->requested_date= $request->requested_date;
            
            $requisition->approved_by = $request->approved_by;
            $requisition->approved_signature= $request->approved_signature;
            $requisition->approved_printed_name= $request->approved_printed_name;
             $requisition->approved_designation= $request->approved_designation;
              $requisition->approved_date= $request->approved_date;
        
            
            $requisition->issued_by = $request->issued_by;
            $requisition->issued_signature = $request->issued_signature;
            $requisition->issued_printed_name = $request->issued_printed_name;
            $requisition->issued_designation = $request->issued_designation;
            $requisition->issued_date = $request->issued_date;
            
            $requisition->received_by = $request->received_by;
            $requisition->received_signature = $request->received_signature;
            $requisition->received_printed_name = $request->received_printed_name;
            $requisition->received_designation = $request->received_designation;
            $requisition->received_date = $request->received_date;

            $requisition->isApproved = $request->isapproved;
            if ($requisition->save()) {
                // Update requisitions_items
                $requisitionItemsData = $request->requisition_items;

                foreach ($requisitionItemsData as $itemsData) {
                    $requisitions_items = Requisitions_item::find($itemsData['id']);
                    // Check if the requisitions_items exists
                    if (!$requisitions_items) {
                        // Handle error, return response or redirect with error message
                        return redirect()->route('employee.requisition.index')->with('error', 'Requisition item not found.');
            }

            // Update requisitions_items fields
            $requisitions_items->stock_no = $itemsData['stock_no'];
            $requisitions_items->unit_id = $itemsData['unit_id'];
            $requisitions_items->item_id = $itemsData['item_id'];
            $requisitions_items->qty = $itemsData['qty'];
            $requisitions_items->isavailable = $itemsData['isAvailable'];
            $requisitions_items->issued_qty = $itemsData['issued_qty'];
            $requisitions_items->remarks = $itemsData['remarks'];

            // Save the updated requisitions_items
            $requisitions_items->save();
        }

        return redirect()->route('employee.requisition.index')->with('success', 'Updated!');
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
        $requisitions = Requisition::where('status', 'pending')
                                    ->where('user_id', session('user_id'))
                                    ->get();

        return view('Employee/requisition.pending', ['requisitions' => $requisitions]);
    }
    public function approved() {

        $requisitions = Requisition::where('status', 'approved')
                                    ->where('user_id', session('user_id'))
                                    ->get();

        return view('Employee/requisition.approved', ['requisitions' => $requisitions]);
    }
    public function disapproved() {

        $requisitions = Requisition::where('status', 'disapproved')
                                    ->where('user_id', session('user_id'))
                                    ->get();

        return view('Employee/requisition.disapproved', ['requisitions' => $requisitions]);
    }

}

