<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Item;
use App\Models\Department;

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
        $Reportsave->issuance_qty = $request->issuance_qty;
        $Reportsave->office = $request->office;
        $Reportsave->balance = $request->balance;
        $Reportsave->days_to_consume = $request->days_to_consume;

        if ($Reportsave->save()) {
            return redirect()->route('admin.reports.index')->withErrors('Successfully added!');
        }
    }

    public function addreports()
    {
        return view('Reports.Store.index', []);
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
        $Editsave->department = $request->department;
        $Editsave->item = $request->item;
        $Editsave->description = $request->description;
        $Editsave->stock_no = $request->stock_no;
        $Editsave->date = $request->date;
        $Editsave->reference = $request->reference;
        $Editsave->receipt_qty = $request->receipt_qty;
        $Editsave->issuance_qty = $request->issuance_qty;
        $Editsave->office = $request->office;
        $Editsave->balance = $request->balance;
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
}