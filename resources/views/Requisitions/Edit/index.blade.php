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
                    
                    


<!-- Requisition Items Table -->
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Stock No</th>
            <th>Unit ID</th>
            <th>Item ID</th>
            <th>Quantity</th>
            <th>Available</th>
            <th>Remarks</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody id="requisition-items-container">
          @if(isset($requisition_items))
            <?php $count = 0; ?>
            @foreach($requisition_items as $value)
                <tr>
                    <td style="width: 100px;">
                        <input type="text" value="{{ $value->stock_no }}" id="stock_no<?php echo $count;?>" name="requisitions[<?php echo $count;?>][0]" class="form-control" readonly>
                    </td>
                    <td style="width: 140px">
                        <select name="requisitions[<?php echo $count;?>][1]" id="unit<?php echo $count;?>" class="form-control" required>
                                @if($units = App\Models\Unit::get())
                                    @foreach($units as $unit)
                                        @if($value->unit_id == $unit->id)
                                            <option value="{{ $unit->id }}" selected> {{ $unit->unit_name }}</option>
                                        @else
                                            <option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                        </select>
                    </td>
                    <td> 
                        <select type="" id="item_name<?php echo $count;?>" name="requisitions[<?php echo $count;?>][2]" onchange="textFill(this)" data-id="<?php echo $count;?>" class="form-control" required>
                            <option value="-1" disabled>Please Select</option>
                            @if($items = App\Models\Item::get())
                                @foreach($items as $item)
                                    @if($value->item_id == $item->id)
                                        <option value="{{ $item->id }}" selected> {{ $item->items_name }}</option>
                                    @else
                                        <option value="{{ $item->id }}"> {{ $item->items_name }}</option>
                                    @endif
                                @endforeach
                            @endif

                        </select>
                    </td>
                    <td style="width: 80px"><input type="number" value="{{ $value->qty }}" id="quantity<?php echo $count;?>" name="requisitions[<?php echo $count;?>][3]" class="form-control" required></td>
                    @if($supplies = App\Models\Supply::where('item_id',$value->item_id)->value('qty'))
                    <td style="width: 80px"><input type="text" value="{{ $supplies }}" id="available<?php echo $count;?>" name="requisitions[<?php echo $count;?>][4]" class="form-control" readonly></td>
                    @endif
                    <td><input type="text" value="{{ $value->remarks }}" id="remarks<?php echo $count;?>" name="requisitions[<?php echo $count;?>][5]" class="form-control"></td>
                    <td style="width: 80px"><input type="text" name="requisitions[<?php echo $count;?>][6]" class="form-control" readonly></td>
                </tr>
                <?php $count++;?>
            @endforeach
            <input type="hidden" id="count" value="<?php echo $count;?>">
        @endif
    </tbody>
</table>

<div class="btn-group">
    <input type="button" value="Add Requisition Item" class="btn btn-sm btn-outline-primary" id="add-requisition-item-button">
    <button class="btn btn-sm btn-primary" style="background-color:forestgreen;">Save</button>
</div>

<script>
    var count = $('#count').val();
    function textFill(select){
        var supply = @JSON($supply);
        var index = $(select).data("id");
        var item_id = $(select).val();
        for(var i = 0; i<supply.length; i++){
            if(supply[i]['item_id'] == item_id){
                $('#stock_no'+index).val(supply[i]['stock_number']);
                $('#available'+index).val(supply[i]['qty']);
                break;
            }
        }
    }
    $('#add-requisition-item-button').on('click', function(){
            $('#requisition-items-container').append(
                '<tr>'
                    +'<td style="width: 100px;">'
                        +'<input type="text" id="stock_no' + count + '" name="requisitions[' + count + '][0]" class="form-control" readonly>'
                    +'</td>'
                    +'<td style="width: 140px">'
                        +'<select name="requisitions[' + count + '][1]" id="unit' + count + '" class="form-control" required>'
                            +'<option value="" disabled selected>Select Unit Name</option>'
                                +'@if($units = App\Models\Unit::get())'
                                    +'@foreach($units as $unit)'
                                        +'<option value="{{ $unit->id }}"selected> {{ $unit->unit_name }}</option>'
                                    +'@endforeach'
                                +'@endif'
                        +'</select>'
                    +'</td>'
                    +'<td>' 
                        +'<select type="" id="item_name' + count + '" name="requisitions[' + count + '][2]" onchange="textFill(this)" data-id="' + count + '" class="form-control" required>'
                            +'<option value="-1" disabled selected>Please Select</option>'
                            +'@if($items = App\Models\Item::get())'
                                +'@foreach($items as $item)'
                                    +'<option value="{{ $item->id }}"> {{ $item->items_name }}</option>'
                                +'@endforeach'
                            +'@endif'
                        +'</select>'
                    +'</td>'
                    +'<td style="width: 80px"><input type="number" id="quantity' + count + '" name="requisitions[' + count + '][3]" class="form-control" required></td>'
                    +'<td style="width: 80px"><input type="text" id="available' + count + '" name="requisitions[' + count + '][4]" class="form-control" readonly></td>'
                    +'<td><input type="text" id="remarks' + count + '" name="requisitions[' + count + '][5]" class="form-control"></td>'
                    +'<td><a class="btn btn-sm btn-danger delete-row-button">Delete</a></td></tr>'
                +'</tr>'
            );
            count++;
        });
</script>
@endsection
