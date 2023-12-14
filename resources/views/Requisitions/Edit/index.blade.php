@extends('layouts.default')

@section('content')

<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <p class="card-title"style="color: #8a2be2; font-weight: bold;">Edit Requisition</p></br>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.requisitions.edit.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $requisition->id }}">

                    <div class="form-group">
                        <label for="requested_by">Requested by:</label>
                        <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Requested by</option>
                            @if($users = App\Models\User::get())
                             @foreach($users as $user) 
                                    @if($user->id == $requisition->requested_by)
                                        <option value="{{ $user->id }}" selected> {{ $user->name }}</option>
                                    @else
                                        <option value="{{ $user->id }}"> {{ $user->name }}</option>
                                    @endif
                            @endforeach
                          @endif
                        </select>
                    </div>

                   <div class="form-group">
                        <label for="requested_designation">Designation:</label>
                        <select type="" name="requested_designation" required="required" class="form-control" >
                            <option value="" disabled selected>Select Department</option>
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    @if($department->id == $requisition->requested_designation)
                                        <option value="{{ $department->id }}" selected> {{ $department->designation}}</option>
                                    @else
                                        <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                                    @endif
                                @endforeach
                            @endif
                    </select>
                </div>

                    <div class="form-group">
                        <label for="approved_by">Approved by:</label>
                        <select type="" name="approved_by" class="form-control" required>
                            <!-- <option value="" disabled selected>Select Department</option> -->
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_user }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="approved_printed_name">Printed Name:</label>
                        <select type="" name="requested_by" class="form-control" required>
                           <!--  <option value="" disabled selected>Select Department</option> -->
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="approved_designation">Designation:</label>
                        <select type="" name="requested_by" class="form-control" required>
                            <!-- <option value="" disabled selected>Select Department</option> -->
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->designation }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="issued_by">Issued by:</label>
                        <select type="" name="issued_by" class="form-control" required>
                            <!-- <option value="" disabled selected>Select Department</option> -->
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_user }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="issued_printed_name">Printed Name:</label>
                        <select type="" name="issued_printed_name" class="form-control" required>
                            <!-- <option value="" disabled selected>Select Department</option> -->
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="issued_designation">Designation:</label>
                        <select type="" name="issued_designation" class="form-control" required>
                            <!-- <option value="" disabled selected>Select Department</option> -->
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->designation }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="received_by">Received by:</label>
                        <select type="" name="received_by" class="form-control" required>
                            <!-- <option value="" disabled selected>Select Department</option> -->
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->department_user }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="received_printed_name">Printed Name:</label>
                        <select type="" name="received_printed_name" class="form-control" required>
                            <!-- <option value="" disabled selected>Select Department</option> -->
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="received_designation">Designation:</label>
                        <select type="" name="received_designation" class="form-control" required>
                            <!-- <option value="" disabled selected>Select Department</option> -->
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}">{{ $department->designation }}</option>
                                @endforeach
                            @endif
                        </select>
                     
                        <div class="form-group">
                            <label for="isapproved">Is Approved:</label>
                            <input type="number" name="isapproved" class="form-control">
                        </div>
                    


<!-- Requisition Items Table -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Stock No</th>
            <th>Unit ID</th>
            <th>Item ID</th>
            <th>Quantity</th>
            <th>Is Available</th>
            <th>Issued Quantity</th>
            <th>Remarks</th>
        </tr>
    </thead>
    <tbody id="requisition-items-container">
          @if(isset($requisition_items))
            @foreach($requisition_items as $value)
                <tr>
                    <td> <select name="stock_no" class="form-control" required>
                            <!-- <option value="" disabled selected>Select Stock No.</option> -->
                            @if($supplies = App\Models\Supply::with('item')->get())
                                @foreach($supplies as $supply)
                                    @if($supply->id == $value->stock_no)
                                        <option value="{{ $supply->id }}" selected> 
                                            {{ $supply->stock_number }} 
                                        </option>
                                    @else
                                        <option value="{{ $supply->id }}"> 
                                            {{ $supply->stock_number }} 
                                        </option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </td>
                    <td><select name="unit_id" id="unit" class="form-control" required>
                                    <option value="" disabled selected>Select Unit Name</option>
                                    @if($units = App\Models\unit::get())
                                        @foreach($units as $unit)
                                          <option value="{{ $unit->id }}"selected> {{ $unit->unit_name }}</option>
                                        @endforeach
                                    @endif
                                </select></td>
                    <td> 
                        <select type="" name="item_id" class="form-control" required>
                            @if($items = App\Models\Item::get())
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->id }}</option>
                                @endforeach
                            @endif
                        </select>
                    </td>
                    <td><input type="number" name="requisition_items[0][qty]" class="form-control" required></td>
                    <td><input type="number" name="requisition_items[0][isAvailable]" class="form-control" required></td>
                    <td><input type="number" name="requisition_items[0][issued_qty]" class="form-control" required></td>
                    <td><input type="text" name="requisition_items[0][remarks]" class="form-control" required></td>
                    <td><button type="button" class="btn btn-sm btn-danger delete-row-button">Delete</button></td>
                </tr>
            @endforeach
        @else
            <tr>
                <td> <select name="stock_no" class="form-control" required>
                        <!-- <option value="" disabled selected>Select Stock No.</option> -->
                        @if($supplies = App\Models\Supply::with('item')->get())
                            @foreach($supplies as $supply)
                                <option value="{{ $supply->id }}"> 
                                    {{ $supply->stock_number }} 
                                </option>
                            @endforeach
                        @endif
                    </select>
                </td>
                <td>
                    <select name="unit_id" id="unit" class="form-control" required>
                        <option value="" disabled selected>Select Unit Name</option>
                            @if($units = App\Models\unit::get())
                                @foreach($units as $unit)
                                    <option value="{{ $unit->id }}"selected> {{ $unit->unit_name }}</option>
                                @endforeach
                            @endif
                    </select>
                </td>
                <td> 
                    <select type="" name="item_id" class="form-control" required>
                        @if($items = App\Models\Item::get())
                            @foreach($items as $item)
                                <option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->id }}</option>
                            @endforeach
                        @endif
                    </select>
                </td>
                <td><input type="number" name="requisition_items[0][qty]" class="form-control" required></td>
                <td><input type="number" name="requisition_items[0][isAvailable]" class="form-control" required></td>
                <td><input type="number" name="requisition_items[0][issued_qty]" class="form-control" required></td>
                <td><input type="text" name="requisition_items[0][remarks]" class="form-control" required></td>
                <td><button type="button" class="btn btn-sm btn-danger delete-row-button">Delete</button></td>
            </tr>
        @endif
    </tbody>
</table>

<div class="btn-group">
    <button class="btn btn-sm btn-outline-primary" id="add-requisition-item-button">Add Requisition Item</button>
    <button class="btn btn-sm btn-primary" style="background-color:forestgreen;">Save</button>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const container = document.getElementById("requisition-items-container");
        const addButton = document.getElementById("add-requisition-item-button");

        addButton.addEventListener("click", function () {
            const newRow = container.insertRow();
            const fields = ["stock_no", "unit_id", "item_id", "qty", "isAvailable", "issued_qty", "remarks"];
            
            fields.forEach((field) => {
                const cell = newRow.insertCell();
                const input = document.createElement("input");
                input.type = "text";
                input.name = `requisition_items[${container.rows.length - 1}][${field}]`;
                input.className = "form-control";
                input.required = true;
                cell.appendChild(input);
            });

            const deleteButton = document.createElement("button");
            deleteButton.type = "button";
            deleteButton.className = "btn btn-sm btn-danger delete-row-button";
            deleteButton.textContent = "Delete";
            deleteButton.addEventListener("click", function () {
                container.deleteRow(newRow.rowIndex - 1);
            });

            newRow.insertCell().appendChild(deleteButton);
        });
    });
</script>
@endsection
