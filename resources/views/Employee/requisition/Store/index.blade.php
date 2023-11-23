@extends('layouts.user')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Add Requisition</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('employee.requisition.store') }}" method="POST">
                    @csrf
                    <div class="container">
                        <h1>Requisition Slip</h1>
                        <div class="form-group">
                            <label for="entity_name">Entity Name:</label>
                            <input type="text" name="entity_name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="fund_cluster">Fund Cluster:</label>
                            <input type="text" name="fund_cluster" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="division_id">Division:</label>
                            <input type="text" name="division_id" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="rc_code">RC Code:</label>
                            <input type="text" name="rc_code" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="office_id">Office:</label>
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
                            <label for="purpose">Purpose:</label>
                            <textarea name="purpose" class="form-control" rows="4" required></textarea>
                        </div>

                         <div class="form-group">
                            <label for="requested_by">Requested by:</label>
                            <input type="text" name="requested_by" class="form-control" required>
                        </div>

                         <div class="form-group">
                            <label for="date_requested">Date Requested:</label>
                            <input type="date" name="date_requested" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="approved_by">Approved by:</label>
                            <input type="text" name="approved_by" class="form-control" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="approved_date">Date Approved:</label>
                            <input type="date" name="approved_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="issued_by">Issued by:</label>
                            <input type="text" name="issued_by" class="form-control" required>
                        </div>
                       
                       <div class="form-group">
                            <label for="issued_date">Date Issued:</label>
                            <input type="date" name="issued_date" class="form-control" required>
                        </div>

                         <div class="form-group">
                            <label for="received_by">Received by:</label>
                            <input type="text" name="received_by" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="received_date">Date Receive:</label>
                            <input type="date" name="received_date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="isapproved">Is Approved:</label>
                            <input type="number" name="isapproved" class="form-control" required>
                        </div>
                    </div>

<!-- Requisition Items Table -->
<table class="table table-bordered">
    <thead>
        <tr>
           <!--  <th>Requisition ID</th> -->
            <th>Stock No</th>
            <th>Unit ID</th>
            <th>Item ID</th>
            <th>Quantity</th>
            <th>Is Available</th>
            <th>Issued Quantity</th>
            <th>Remarks</th>
            <th>Is Approved</th>
        </tr>
    </thead>
    <tbody id="requisition-items-container">
        <tr>
            <td>
                <input type="text" name="requisition_id[]" class="form-control" required>
            </td>
             <td>
            <input type="text" name="requisition_items[0][stock_no]" class="form-control" required>
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
            <td>
                <input type="text" name="requisition_items[0][isapproved]" class="form-control" required>
            </td>
        </tr>
    </tbody>
</table>

<div class="btn-group">
    <button class="btn btn-sm btn-outline-primary" id="add-requisition-item-button">Add Requisition Item</button>
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
                    <input type="text" name="requisition_id[]" class="form-control" required>
                </td>
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




@endsection