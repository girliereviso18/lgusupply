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
                            <input type="text" name="fund_cluster" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="division_id">Division:</label>
                            <select type="" name="division_id" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </select>
                      </div>
                        
                        <div class="form-group">
                            <label for="rc_code">RC Code:</label>
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
                        
                    </div>

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

                      
                    </div>

                        
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
                    
                    </div>
                       
                    <div class="form-group">
                        <label for="status">Status:</label>
                        <select name="status" class="form-control" required>
                            <option value="pending">Pending</option>
                            <option value="approved">Approved</option>
                            <option value="disapproved">Disapproved</option>
                        </select>
                    </div>

                    <!-- Requisition Items Table -->
                    <table class="table table-bordered" style="margin: 0px;">
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
                              <tr>
                                <td>
                                  <input type="hidden" name="stock_no[0]" value="1">
                                  <span class="form-control">1</span>
                                </td>
                                <td><select name="unit_id[0]" id="unit" class="form-control" required>
                                                <option value="" disabled selected>Select Unit Name</option>
                                                @if($units = App\Models\Unit::get())
                                                    @foreach($units as $unit)
                                                      <option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>
                                                    @endforeach
                                                @endif
                                            </select></td>
                                <td><select type="" name="item_id[0]" class="form-control" required>
                                    <option value="" disabled selected>Select</option>
                                    @if($items = App\Models\Item::get())
                                        @foreach($items as $item)
                                            <option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->id }}</option>
                                        @endforeach
                                    @endif
                                  </select>
                                </td>
                                <td><input type="number" name="qty[0]" class="form-control" required></td>
                                <td><input type="number" name="isAvailable[0]" class="form-control" required></td>
                                <td><input type="number" name="issued_qty[0]" class="form-control" required></td>
                                <td><input type="text" name="remarks[0]" class="form-control" required></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="form-custom">
                      <button type="button" class="btn btn-sm btn-danger delete-row-button">Delete</button>
                    </div>
                    <input type="hidden" name="index" id="index" values="1">
                    <div class="btn-group">
                        <button class="btn btn-sm btn-outline-primary" id="add-requisition-item-button">Add Requisition Item</button>
                      <button type="submit" class="btn btn-sm btn-primary" style="background-color:forestgreen;">Save</button>
                    </div>
<style>
  .form-custom{
    display: flex;
    justify-content: flex-end;
    background: transparent;
    border: 1px solid #ced4da;
    border-top: none;
    padding: 0.5em;
    height: 48px;
    margin-bottom: 1em;
  }
</style>       
<script>
    $('#add-requisition-item-button').click(function(){
    var i = $('#index').val();
    i++;
    var row = i+1;
    var html = '<tr id="row'+i+'">';
    html += '<input type="hidden" name="stock_no['+i+']" value="'+row+'">';
    html += '<td><span class="form-control">'+row+'</span></td>';
    html += '<td><select name="unit_id['+i+']" id="unit" class="form-control" required>';
    html += '<option value="" disabled selected>Select Unit Name</option>';
    html += '@if($items = App\Models\Item::get())'+
                '@foreach($units as $unit)'+
                  '<option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>'+
                '@endforeach'+
            '@endif';
    html += '</td>';
    html += '<td><select type="" name="item_id['+i+']" class="form-control" required>';
    html += '<option value="" disabled selected>Select</option>';
    html += '@if($units = App\Models\Unit::get())'+
                '@foreach($items as $item)'+
                  '<option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->id }}</option>'+
                '@endforeach'+
            '@endif';
    html += '</td>';
    
    html += '<td><input type="number" name="qty['+i+']" class="form-control" required></td>'+
            '<td><input type="number" name="isAvailable['+i+']" class="form-control" required></td>'+
            '<td><input type="number" name="issued_qty['+i+']" class="form-control" required></td>'+
            '<td><input type="text" name="remarks['+i+']" class="form-control" required></td>';
    html += '</tr>';
    $('#requisition-items-container').append(html);
    $('#index').val(i);
  })

  $('.delete-row-button').click(function (){
    var i = $('#index').val();
    if(i != 0){
      $('#row'+i).remove();
      i--;
      $('#index').val(i);
    }
  })
</script>
@endsection