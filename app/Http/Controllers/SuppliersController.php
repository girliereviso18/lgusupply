<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SuppliersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $suppliers = Supplier::get();

        return view('Suppliers.index', [
            'suppliers' => $suppliers
        ]);
    }

    public function store(Request $request)
    {
        $supplierSave = new Supplier();
        $supplierSave->suppliers_name = $request->suppliers_name;
        $supplierSave->contact_number = $request->contact_number;
        $supplierSave->address = $request->address;
        $supplierSave->status = $request->status;

        if ($supplierSave->save()) {
            return redirect()->route('suppliers.index')->with('success', 'Successfully added!');
        }
    }

    public function editsuppliers(Request $request)
    {
        $supplier = Supplier::find($request->id);

        return view('Suppliers.Edit.index', [
            'supplier' => $supplier
        ]);
    }

    public function updatesuppliers(Request $request)
    {
        $editSave = Supplier::find($request->id);
        $editSave->suppliers_name = $request->suppliers_name;
        $editSave->contact_number = $request->contact_number;
        $editSave->address = $request->address;
        $editSave->status = $request->status;

        if ($editSave->save()) {
            return redirect()->route('suppliers.index')->with('success', 'Updated!');
        }
    }

    public function deletesuppliers(Request $request)
    {
        $deleteSave = Supplier::find($request->id);

        if ($deleteSave->delete()) {
            return redirect()->route('suppliers.index')->with('success', 'Deleted!');
        }
    }
}