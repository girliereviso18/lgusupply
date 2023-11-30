@extends('layouts.default')

@section('content')

<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
               <p class="card-title">Edit Requisition</p></br>
            </div>
            <div class="card-body">
                </div>
                <div class="card-body"> 
                    <form action="{{route('admin.requisitions.edit.save')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $requisition->id }}">
                        <div class="form-group">
                            <label>Entity Name</label>
                            <input type="text" class="form-control" name="entity_name" value="{{ $requisition->entity_name}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Fund Cluster</label>
                            <input type="text" class="form-control" name="fund_cluster" value="{{ $requisition->fund_cluster}}">
                        </div>
                        <div class="form-group">
                            <label>Division</label>
                              <select type="" name="division_id" class="form-control" required>
                            <option value="" disabled selected>Select Division</option>
                             @if($divisions = App\Models\division::get())
                             @foreach($divisions as $division)
                              <option value="{{ $division->id }}"> {{ $division->division_name }}</option>
                            @endforeach
                          @endif
                      </select>
                       </div>
                          <div class="form-group">
                            <label>RC</label>
                           <select type="" name="rc_code" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}-{{ $department->responsibility_code }}</option>
                            @endforeach
                          @endif
                      </select>
                        </div>
                          <div class="form-group">
                            <label>Office</label>
                            <select type="" name="office_id" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </select>
                        </div>
                        <div class="form-group">
                            <label>Purpose</label>
                            <input type="text" class="form-control" name="purpose" value="{{ $requisition->purpose}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Requested by</label>
                            <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </select>
                      </div>
                      <div>
                        <label for="requested_signature">Signature:</label>
                        <input type="text" name="requested_signature" id="requested_signature">
                    </div>
                        
                        <div class="form-group">
                           <label for="requested_printed_name">Printed Name:</label>
                            <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->name }}</option>
                            @endforeach
                          @endif
                      </select>
                  </div>
                         <div class="form-group">
                        <label for="requested_designation">Designation:</label>
                         <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                            @endforeach
                          @endif
                      </select>
                  </div>
                        <label for="requested_date">Date:</label>
                        <input type="date" name="requested_date" id="requested_date" required>
                         <div class="form-group">
                            <label for="approved_by">Approved by:</label>
                            <select type="" name="approved_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </select>
                      </div>
                        <label for="approved_signature">Signature:</label>
                        <input type="text" name="approved_signature" id="approved_signature" >
                        <div class="form-group">

                        <label for="approved_printed_name">Printed Name:</label>
                        <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->name }}</option>
                            @endforeach
                          @endif
                      </select>
                  </div>
                        <div class="form-group"> <label for="approved_designation">Designation:</label>
                        <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                            @endforeach
                          @endif
                      </select>
                  </div>

                        <label for="approved_date">Date:</label>
                        <input type="date" name="approved_date" id="approved_date" required>
                      <div class="form-group">
                            <label for="issued_by">Issued by:</label>
                             <select type="" name="issued_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </select>
                      </div>
                       <div>
                        <label for="issued_signature">Signature:</label>
                        <input type="text" name="issued_signature" id="issued_signature" >
                        <div class="form-group"> 
                         <label for="issued_printed_name">Printed Name:</label>
                             <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->name }}</option>
                            @endforeach
                          @endif
                      </select>
                    </div>
                       

                       <div class="form-group">
                        <label for="issued_designation">Designation:</label>
                         <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                            @endforeach
                          @endif
                      </select>
                  </div>
                    <div class="form-group">

                        <label for="issued_date">Date:</label>
                        <input type="date" name="issued_date" id="issued_date" required>
                    </div>
                       
                      
                         <div class="form-group">
                            <label for="received_by">Received by:</label>
                            <select type="" name="received_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </select>
                      </div>
                      <div class="form-group">
                        <label for="received_signature">Signature:</label>
                        <input type="text" name="received_signature" id="received_signature">
                        <div>
                        <label for="received_printed_name">Printed Name:</label>
                        <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->name }}</option>
                            @endforeach
                          @endif
                      </select>
                     </div>
                        <div class="form-group">
                        <label for="received_designation">Designation:</label>
                        <select type="" name="requested_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                            @endforeach
                          @endif
                      </select>
                     </div>
                        <label for="received_date">Date:</label>
                        <input type="date" name="received_date" id="received_date" required>
                    </div>
                       

                        <div class="form-group">
                            <label for="isapproved">Is Approved:</label>
                            <input type="number" name="isapproved" class="form-control">
                        </div>
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
                            <option value="{{ $supply->id }}"> 
                                {{ $supply->stock_number }} 
                            </option>
                        @endforeach
                    @endif
                </select>
            </td>
            <td><select name="unit" id="unit" class="form-control" required>
                            <option value="" disabled selected>Select Unit Name</option>
                            @if($units = App\Models\unit::get())
                                @foreach($units as $unit)
                                  <option value="{{ $unit->id }}"selected> {{ $unit->unit_name }}</option>
                                @endforeach
                            @endif
                        </select></td>
            <td> <select type="" name="item" class="form-control" required>
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
            @endforeach
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
