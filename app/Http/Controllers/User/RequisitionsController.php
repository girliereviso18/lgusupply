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

        return view('employee.requisition.index', ['requisitions' => $requisitions]);
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
        $requisition->requested_by = $request->requested_by;
        $requisition->date_requested = $request->date_requested;
        $requisition->approved_by = $request->approved_by;
        $requisition->approved_date = $request->approved_date;
        $requisition->issued_by = $request->issued_by;
        $requisition->issued_date = $request->issued_date;
        $requisition->received_by = $request->received_by;
        $requisition->received_date = $request->received_date;
        $requisition->isApproved = $request->isapproved;

        if ($requisition->save()) {
            
            $requisitionItemsData = $request->requisition_items; 

            foreach ($requisitionItemsData as $itemsData) { 
                $requisitions_items = new Requisitions_item();
                $requisitions_items->requisitions_id = $requisition->id; 
                $requisitions_items->stock_no = $itemsData['stock_no']; 
                $requisitions_items->unit_id = $itemsData['unit_id']; 
                $requisitions_items->item_id = $itemsData['item_id']; 
                $requisitions_items->qty = $itemsData['qty']; 
                $requisitions_items->isavailable = $itemsData['isAvailable']; 
                $requisitions_items->issued_qty = $itemsData['issued_qty']; 
                $requisitions_items->remarks = $itemsData['remarks']; 

                if ($requisitions_items->save()) {
                    return redirect()->route('employee.requisitions.index')->with('success', 'Successfully added!');
            
                }

            }
        }else{
            return redirect()->route('employee.requisition.index')->with('error', 'Failed to create requisition.');
        }
    }

    public function addrequisitions()
    {
        return view('employee.requisition.store.index');
    }

    public function editrequisitions(Request $request)
    {
        $requisition = Requisition::find($request->id);
        $requisition_items = Requisitions_item::where('requisitions_id', $request->id)
                                            ->get();

        return view('requisitions.Edit.index', [
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
            $requisition->requested_by = $request->requested_by;
            $requisition->date_requested = $request->date_requested;
            $requisition->approved_by = $request->approved_by;
            $requisition->approved_date = $request->approved_date;
            $requisition->issued_by = $request->issued_by;
            $requisition->issued_date = $request->issued_date;
            $requisition->received_by = $request->received_by;
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
            
        return view('employee.requisitions.view', [
            'requisition' => $requisition
        ]);
    }
    
    public function requisitionsprint(Request $request)
    {
        $requisition = Requisition::where('id', $request->id)->first();
        $requisitionitems = Requisitions_item::where('id', $request->id)->get();
            
        return view('employee.requisitions.print.index', [
            'requisition' => $requisition,
            'requisitionitems' => $requisitionitems
        ]);
    }
    public function show($id) {
        $requisition = Requisition::find($id);
        $requisitionItems = $requisition->requisitionItems; 

        return view('employee.requisitions.view', ['requisition' => $requisition, 'requisitionItems' => $requisitionItems]);


    }

}

