@extends('layouts.user')

@section('content')

    <form action="{{ route('employee.requisition.store') }}" method="POST">
        <div class="col-sm-12">
            <div class="row" style="flex-direction: column;">
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Requisition Slip</h3>
                        </div>
                        <div class="card-body">
                            @csrf
                            <div class="container row" style="margin: 0;">
                                <div class="col-md-12 row">
                                    <div class="col-md-4 form-group">
                                        <label for="entity_name">Entity Name:</label>
                                        <input type="text" name="entity_name" value="{{ $username }}" class="form-control" required>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="fund_cluster">Fund Cluster:</label>
                                        <input type="text" name="fund_cluster" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="division_id">Division:</label>
                                    <select type="" name="division_id" class="form-control" required>
                                            <option value="" disabled selected>Select Division</option>
                                            @if($divisions = App\Models\Division::get())
                                            @foreach($divisions as $division)
                                            <option value="{{ $division->id }}"> {{ $division->division_name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="rc_code">RC Code:</label>
                                        <select type="" name="rc_code" class="form-control" required>
                                            <option value="" disabled selected>Select Department</option>
                                            @if($departments = App\Models\Department::get())
                                            @foreach($departments as $department)
                                            <option value="{{ $department->id }}"> {{ $department->department_user }}-{{ $department->responsibility_code }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="office_id">Office:</label>
                                        <select type="" name="office_id" class="form-control" required>
                                            <option value="" disabled selected>Select Department</option>
                                            @if($departments = App\Models\Department::get())
                                            @foreach($departments as $department)
                                            <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="purpose">Purpose:</label>
                                        <textarea name="purpose" class="form-control" rows="4" required></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 row">
                                    <div class="col-md-12 form-group">
                                        <label for="requested_by">REQUESTED BY</label>  
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="requested_printed_name">Printed Name:</label>
                                        <input type="hidden" id="requested_by" name="requested_printed_name">
                                        <select type="" name="requested_by" class="form-control requested_by" required>
                                            <option value="" disabled selected>Select Name</option>
                                            @if($departments = App\Models\Department::get())
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->id }}"> {{ $department->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class=" col-md-4 form-group">
                                        <label for="requested_designation">Designation:</label>
                                        <select type="" name="requested_designation" class="form-control" required>
                                            <option value="" disabled selected>Select Designation</option>
                                            @if($departments = App\Models\Department::get())
                                            @foreach($departments as $department)
                                                <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <input type="hidden" name="status" value="pending">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="card card-outline card-primary">
                        <div class="card-header">
                            <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Items</h3>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered" id="myTable">
                                <thead>
                                    <tr>
                                        <th>Stock No</th>
                                        <th>Item Description</th>
                                        <th>Unit ID</th>
                                        <th>Quantity</th>
                                        <th>Available</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="requisitionfield" id="requisition-items-container">
                                    <tr>
                                        <td style="width: 100px;">
                                            <input type="text" id="stock_no0" name="requisitions[0][0]" class="form-control" readonly>
                                        </td>
                                        <td> 
                                            <select type="" id="item_name0" name="requisitions[0][2]" onchange="textFill(this)" data-id="0" class="form-control" required>
                                                <option value="-1" disabled selected>Please Select</option>
                                                @foreach($reports as $item)
                                                    @if($item_name = App\Models\Item::where('id', $item->item)->value('items_name'))
                                                    <option value="{{ $item->item }}"> {{ $item_name }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </td>
                                        <td style="width: 140px">
                                            <select name="requisitions[0][1]" id="unit0" class="form-control" required>
                                                <option value="" disabled selected>Select Unit Name</option>
                                                    @if($units = App\Models\Unit::get())
                                                        @foreach($units as $unit)
                                                            <option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>
                                                        @endforeach
                                                    @endif
                                            </select>
                                        </td>
                                        <td style="width: 80px"><input type="number" id="quantity0" name="requisitions[0][3]" min="1" class="form-control" required></td>
                                        <td style="width: 80px"><input type="text" id="available0" name="requisitions[0][4]" class="form-control" readonly></td>
                                        <td><input type="text" id="remarks0" name="requisitions[0][5]" class="form-control"></td>
                                        <td style="width: 80px"><input type="text" name="requisitions[0][6]" class="form-control" readonly></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="btn-group" style="margin-bottom: 10px;">
                        <a class="btn btn-sm btn-outline-primary" id="add-requisition-item-button"style="color: #8a2be2; font-weight: bold;">Add Requisition Item</a>
                        <button class="btn btn-sm btn-primary" style="background-color:forestgreen;">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" name="date" value="<?php
            date_default_timezone_set('Asia/Manila');
            $currentDate = date('Y-m-d H:i:s');
            
        ?>">
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function textFill(select){
            var supplies = @JSON($reports);
            var index = $(select).data("id");
            var item_id = $(select).val();
            for(var i = 0; i<supplies.length; i++){
                if(supplies[i]['item'] == item_id){
                    $('#stock_no'+index).val(supplies[i]['stock_no']);
                    $('#available'+index).val(supplies[i]['balance']);
                    break;
                }
            }
        }
        $('.requested_by').on('change', function(){
            $('#requested_by').val($(this).find('option:selected').text());
        });
        $('.issued_by').on('change', function(){
            $('#issued_by').val($(this).find('option:selected').text());
        });
        $('.received_by').on('change', function(){
            $('#received_by').val($(this).find('option:selected').text());
        });

        var count=1;
        $('#myTable').on('click', '.delete-row-button', function() {
          $(this).closest('tr').remove();

        });
        $('#add-requisition-item-button').on('click', function(){
            $('.requisitionfield').append(
                '<tr>'
                    +'<td style="width: 100px;">'
                        +'<input type="text" id="stock_no' + count + '" name="requisitions[' + count + '][0]" class="form-control" readonly>'
                    +'</td>'
                    +'<td>' 
                        +'<select type="" id="item_name' + count + '" name="requisitions[' + count + '][2]" onchange="textFill(this)" data-id="' + count + '" class="form-control" required>'
                            +'<option value="-1" disabled selected>Please Select</option>'
                            +'@foreach($reports as $item)'
                                +'@if($item_name = App\Models\Item::where("id", $item->item)->value("items_name"))'
                                +'<option value="{{ $item->item }}"> {{ $item_name }}</option>'
                                +'@endif'
                            +'@endforeach'
                        +'</select>'
                    +'</td>'
                    +'<td style="width: 140px">'
                        +'<select name="requisitions[' + count + '][1]" id="unit' + count + '" class="form-control" required>'
                            +'<option value="" disabled selected>Select Unit Name</option>'
                                +'@if($units = App\Models\Unit::get())'
                                    +'@foreach($units as $unit)'
                                        +'<option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>'
                                    +'@endforeach'
                                +'@endif'
                        +'</select>'
                    +'</td>'
                    +'<td style="width: 80px"><input type="number" id="quantity' + count + '" min="1" name="requisitions[' + count + '][3]" class="form-control" required></td>'
                    +'<td style="width: 80px"><input type="text" id="available' + count + '" name="requisitions[' + count + '][4]" class="form-control" readonly></td>'
                    +'<td><input type="text" id="remarks' + count + '" name="requisitions[' + count + '][5]" class="form-control"></td>'
                    +'<td><a class="btn btn-sm btn-danger delete-row-button">Delete</a></td>'
                +'</tr>'
            );
            count++;
        });
    </script>
@endsection
