@extends('layouts.user')

@section('content')

<div class="container" style="margin-top: 52px;">
     @include('layouts.partials.messages') 
    <div class="row p-3">
        <div class="col-sm-9">
            <div class="card card-outline card-primary">
                <div class="card-header"><br>
                    <p class="card-title">Edit Items</p></br>
                </div>
                <div class="card-body"> 
                    <form action="{{route('employee.requisition.edit.save')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="{{ $requisition->id }}">
                        <div class="form-group">
                            <label>Entity Name</label>
                            <input type="text" class="form-control" name="entity_name" value="{{ $requisition->entity_name}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Fund Cluster</label>
                            <input type="text" class="form-control" name="fund_cluster" value="{{ $requisition->fund_cluster}}" required="required">
                        </div>
                           <div class="form-group">
                            <label>Division</label>
                            <input type="text" class="form-control" name="division_id" value="{{ $requisition->division_id}}" required="required">
                        </div>
                          <div class="form-group">
                            <label>RC</label>
                            <textarea type="text" class="form-control" name="rc_code" value="{{ $requisition->rc_code}}" required="required">{{ $requisition->rc_code}}</textarea>
                         </div>
                          <div class="form-group">
                            <label>Office</label>
                            <input type="text" class="form-control" name="office_id" value="{{ $requisition->office_id}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Purpose</label>
                            <input type="text" class="form-control" name="purpose" value="{{ $requisition->purpose}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Requested by</label>
                            <input type="text" class="form-control" name="requested_by" value="{{ $requisition->requested_by}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Date Requested </label>
                            <input type="date" class="form-control" name="date_requested" value="{{ $requisition->date_requested}}" required="required">
                        </div>
                         <div class="form-group">
                            <label>Approved by </label>
                            <input type="text" class="form-control" name="approved_by" value="{{ $requisition->approved_by}}" required="required">
                        </div>
                         <div class="form-group">
                            <label>Approved Date </label>
                            <input type="date" class="form-control" name="approved_date" value="{{ $requisition->approved_date}}" required="required">
                        </div>
                         <div class="form-group">
                            <label>Issued by  </label>
                            <input type="text" class="form-control" name="issued_by" value="{{ $requisition->issued_by}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Issued Date </label>
                            <input type="date" class="form-control" name="issued_date" value="{{ $requisition->issued_date}}" required="required">
                        </div>
                         <div class="form-group">
                            <label>Received by </label>
                            <select name="received_by" id="received_by" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </select>
                        </div>
                        <div class="form-group">
                            <label>Received Date </label>
                            <input type="date" class="form-control" name="received_date" value="{{ $requisition->received_date}}" required="required">
                        </div>
                        <div class="form-group">
                            <label>Approved </label>
                            <input type="text" class="form-control" name="isapproved" value="{{ $requisition->isapproved}}" required="required">
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
               
                 <td>
                <input type="text" name="requisition_items[0][stock_no]" value="{{ $value->stock_no}}" class="form-control" required>
                </td>
                 <td>
                <input type="text" name="requisition_items[0][unit_id]" class="form-control" required>
                  </td>
                  <td>
                    <input type="text" name="requisition_items[0][item_id]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="requisition_items[0][qty]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="requisition_items[0][isAvailable]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="requisition_items[0][issued_qty]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="requisition_items[0][remarks]" class="form-control" required>
                </td>
            </tr>
             @endforeach
        @endif
    </tbody>
</table>


<div class="btn-group">
    <button class="btn btn-sm btn-outline-primary" id="add-requisition-item-button">Edit Requisition Item</button>
    <button class="btn btn-sm btn-primary">Save</button>
</div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Add more rows to the table when the "Add Requisition Item" button is clicked
        document.getElementById("add-requisition-item-button").addEventListener("click", function () {
            const container = document.getElementById("requisition-items-container");
            const newRow = document.createElement("tr");
            newRow.innerHTML = `
               
                <td>
                    <input type="text" name="stock_no[]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="unit_id[]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="item_id[]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="qty[]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="isAvailable[]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="issued_qty[]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="remarks[]" class="form-control" required>
                </td>
                <td>
                    <input type="text" name="isapproved[]" class="form-control" required>
                </td>
            `;
            container.appendChild(newRow);
        });
    });
</script>
@endSection