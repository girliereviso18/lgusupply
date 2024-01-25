<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Item;
use App\Models\Department;
use App\Models\Supply;
use Illuminate\Support\Facades\URL;

class ReportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $reports = Report::get();
        foreach ($reports as $row) {
            $dep = Department::where('id', $row->department)->value('department_user');
            $row->department = $dep;
            $item = Item::where('id', $row->item)->value('items_name');
            $row->item = $item;
            $row->office = $dep;
        }
        return view('Reports.index', ['reports' => $reports]);
    }

    public function store(Request $request)
    {
        $Reportsave = new Report();
        $Reportsave->department= $request->department;
        $Reportsave->item = $request->item;
        $Reportsave->description = $request->description;
        $Reportsave->stock_no = $request->stock_no;
        $Reportsave->date = $request->date;
        $Reportsave->reference = $request->reference;
        $Reportsave->receipt_qty = $request->receipt_qty;
        $Reportsave->office = $request->office;
        $Reportsave->balance = $request->receipt_qty;
        $Reportsave->days_to_consume = $request->days_to_consume;

        Supply::where('item_id', $request->item)
        ->where('qty', '>=', $request->receipt_qty)
        ->decrement('qty', $request->receipt_qty);

        if ($Reportsave->save()) {
            return redirect()->route('admin.reports.index')->withErrors('Successfully added!');
        }
    }

    public function addreports()
    {
        $supplies = Supply::get();
        $department = Department::get();
        return view('Reports.Store.index', [
            'supplies' => $supplies,
            'departments' => $department
        ]);
    }

    public function editreports(Request $request)
    {
        $report = Report::where('id', $request->id)->first();

        return view('Reports.Edit.index', [
            'report' => $report
        ]);
    }

    public function updatereports(Request $request)
    {
        $Editsave = Report::where('id', $request->id)->first();

        if($Editsave->receipt_qty > $request->receipt_qty){
            $q = $Editsave->receipt_qty - $request->receipt_qty;
            Supply::where('item_id',$Editsave->item)
            ->increment('qty', $q);
        }else if($Editsave->receipt_qty < $request->receipt_qty){
            $q = $request->receipt_qty - $Editsave->receipt_qty;
            Supply::where('item_id',$Editsave->item)
            ->decrement('qty', $q);
        }

        $Editsave->department = $request->department;
        $Editsave->item = $request->item;
        $Editsave->description = $request->description;
        $Editsave->stock_no = $request->stock_no;
        $Editsave->date = $request->date;
        $Editsave->reference = $request->reference;
        $Editsave->receipt_qty = $request->receipt_qty;
        $Editsave->issuance_qty = $request->issuance_qty;
        $Editsave->office = $request->office;
        $Editsave->days_to_consume = $request->days_to_consume;
        
        if ($Editsave->update()) {
            return redirect()->route('admin.reports.index')->withErrors('Updated!');
        }
    }

    public function deletereports(Request $request)
    {
        $Deletesave = Report::where('id', $request->id)->first();

        if ($Deletesave->delete()) {
            return redirect()->back()->withErrors('Delete!');
        }
    }

    public function viewreports(Request $request)
    {
        $report = Report::where('id', $request->id)->first();
            
        return view('Reports.view', [
            'report' => $report
        ]);
    }

    public function reportsprint(Request $request)
    {
        $report = Report::where('id', $request->id)->first();
        if ($report) {
            $department_name = Department::where('id', $report->department)->value('department_user');
            $report->department = $department_name;
        
            $item_name = Item::where('id', $report->item)->value('items_name');
            $report->item = $item_name;

            $office = Department::where('id', $report->office)->value('department_user');
            $report->office = $office;
        
            return view('Reports.print.index', [
                'report' => $report,
            ]);
        }
        
    }

    public function show($id) {
        $report = Report::find($id); 

        return view('Reports.view', ['reports' => $report]);
    }

    public function department(Request $request){
        //return $request->id;
        $reports = Report::where('department', $request->id)->get();
        $supplies = Supply::get();



        $reportsItem = array();
        foreach ($reports as $report) {
            $reportsItem[] = (int)$report->item;
        }
        
        $suppliesItem = array();
        foreach ($supplies as $supply) {
            $suppliesItem[] = (int)$supply->item_id;
        }
        
        // Find values unique to each array
        $uniqueReports = array_values(array_diff($reportsItem, $suppliesItem));
        $uniqueSupplies = array_values(array_diff($suppliesItem, $reportsItem));
        
        // Combine the unique values
        $getItems = array_merge($uniqueReports, $uniqueSupplies);
        

        $items = array();
        foreach($getItems as $item){
            $data = Item::where('id', $item)->first();
            if ($data) {
                $items[] = array(
                    'id'          => $item,
                    'item'        => $data->items_name,
                    'description' => $data->description
                );
            }
        }
        
        return response()->json(['items' => $items]);
    }
}