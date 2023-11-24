<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use Illuminate\Support\Facades\URL;

class DepartmentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $departments = Department::get();

        return view('Departments.index', [
            'departments' => $departments
        ]);
    }

    public function store(Request $request)
    {
        $Departmentsave = new Department();
        $Departmentsave->department_user = $request->department_user;
        $Departmentsave->name = $request->name;
        $Departmentsave->responsibility_code = $request->responsibility_code;
        $Departmentsave->designation = $request->designation;
        $Departmentsave->contact_number = $request->contact_number;
        $Departmentsave->email_address = $request->email_address;

        if ($Departmentsave->save()) {
            return redirect()->route('departments.index')->withErrors('Successfully added!');
        }
    }

    public function adddepartments()
    {
        return view('Departments.Store.index', []);
    }

    public function editdepartments(Request $request)
    {
        $department = Department::where('id', $request->id)->first();

        return view('Departments.Edit.index', [
            'department' => $department
        ]);
    }

    public function updatedepartments(Request $request)
    {
        $Editsave = Department::where('id', $request->id)->first();
        $Editsave->department_user = $request->department_user;
        $Editsave->name = $request->name;
        $Editsave->responsibility_code = $request->responsibility_code;
        $Editsave->designation = $request->designation;
        $Editsave->contact_number = $request->contact_number;
        $Editsave->email_address = $request->email_address;




        if ($Editsave->update()) {
            return redirect()->route('departments.index')->withErrors('Updated!');
        }
    }

    public function deletedepartments(Request $request)
    {
        $Deletesave = Department::where('id', $request->id)->first();

        if ($Deletesave->delete()) {
            return redirect()->back()->withErrors('Delete!');
        }
    }
}
