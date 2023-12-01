<?php

namespace App\Http\Controllers;

use App\Models\ApprovedRequisition;
use App\Models\Requisition;
use App\Models\Requisitions_item;
use Illuminate\Http\Request;

class ApprovedRequisitionsController extends Controller
{
   public function index(Request $request)
{
    $requisitionId = $request->get('requisition_id');
    // Logic for fetching approved requisitions and associated details

    return view('approved_requisitions.index', [
        'requisitionId' => $requisitionId,
        'approvedRequisitions' => $approvedRequisitions
    ]);
}

    public function approve($id)
    {
        $requisition = Requisition::find($id);

        if (!$requisition) {
            return redirect()->back()->with('error', 'Requisition not found.');
        }

        // Your approval logic

        // Create a record in the approved_requisitions table
        ApprovedRequisition::create([
            'requisition_id' => $requisition->id,
            // Add other fields as needed
        ]);

        $requisition->isapproved = true;
        $requisition->save();

        return redirect()->back()->with('success', 'Requisition approved successfully.');
    }
}
