@extends('layouts.user')

@section('content')

<form action="{{ route('employee.requisition.edit.save') }}" method="POST">
    <div class="col-sm-12">
        <div class="row" style="flex-direction: column;">
            <div class="col-sm-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Requisition Slip</h3>
                    </div>
                    <div class="card-body">
                        @csrf
                        <input type="hidden" name="id" value="{{ $requisition->id}}">
                        <div class="container row" style="margin: 0;">
                            <div class="col-md-12 row">
                                <div class="col-md-4 form-group">
                                    <label for="entity_name">Entity Name:</label>
                                    <input type="text" name="entity_name" value="{{ $requisition->entity_name }}" class="form-control" required>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="fund_cluster">Fund Cluster:</label>
                                    <input type="text" name="fund_cluster" value="{{ $requisition->fund_cluster }}" class="form-control">
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="division_id">Division:</label>
                                <select type="" name="division_id" class="form-control" required>
                                    @if($div = App\Models\Division::get())
                                        @foreach($div as $div) 
                                            @if($div->id == $requisition->division_id)
                                                <option value="{{ $requisition->division_id }}" selected> {{ $div->division_name }}</option>
                                            @else
                                                <option value="{{ $div->id }}"> {{ $div->division_name }}</option>
                                            @endif
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
                                                @if($department->id == $requisition->rc_code)
                                                    <option value="{{ $department->id }}" selected> {{ $department->department_user }}-{{ $department->responsibility_code }}</option>
                                                @else
                                                    <option value="{{ $department->id }}"> {{ $department->department_user }}-{{ $department->responsibility_code }}</option>
                                                @endif
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
                                                @if($department->id == $requisition->rc_code)
                                                    <option value="{{ $department->id }}" selected> {{ $department->department_user }}</option>
                                                @else
                                                    <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="purpose">Purpose:</label>
                                    <textarea name="purpose" class="form-control" rows="4" required>{{ $requisition->purpose }}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-12 form-group">
                                    <label for="requested_by">REQUESTED BY</label>  
                                </div>
                                <div class="col-md-4 form-group">
                                    <label for="requested_printed_name">Printed Name:</label>
                                    <input type="hidden" id="requested_by" name="requested_printed_name" value="{{ $requisition->requested_printed_name }}">
                                    <select type="" name="requested_by" class="form-control requested_by" required>
                                        <option value="" disabled selected>Select Name</option>
                                        @if($departments = App\Models\Department::get())
                                            @foreach($departments as $department)
                                                @if($department->id == $requisition->requested_by)
                                                    <option value="{{ $department->id }}" selected> {{ $department->name }}</option>
                                                @else
                                                    <option value="{{ $department->id }}"> {{ $department->name }}</option>
                                                @endif
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
                                                @if($department->id == $requisition->requested_designation)
                                                    <option value="{{ $department->id }}" selected> {{ $department->designation }}</option>
                                                @else
                                                    <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                                                @endif
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
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
                    <tbody id="requisition-items-container">
                        @if(isset($requisition_items))
                            <?php $count = 0; ?>
                            @foreach($requisition_items as $value)
                                <tr>
                                    <td style="width: 100px;">
                                        <input type="text" value="{{ $value->stock_no }}" id="stock_no<?php echo $count;?>" name="requisitions[<?php echo $count;?>][0]" class="form-control" readonly>
                                    </td>
                                    <td> 
                                        <select type="" id="item_name<?php echo $count;?>" name="requisitions[<?php echo $count;?>][2]" onchange="textFill(this)" data-id="<?php echo $count;?>" class="form-control" required>
                                            <option value="-1" disabled>Please Select</option>
                                            @foreach($reports as $item)
                                              @if($value->item_id == $item->item)
                                                @if($item_name = App\Models\Item::where('id', $item->item)->value('items_name'))
                                                  <option value="{{ $item->item }}" selected> {{ $item_name }}</option>
                                                @endif
                                              @else
                                                @if($item_name = App\Models\Item::where('id', $item->item)->value('items_name'))
                                                  <option value="{{ $item->item }}"> {{ $item_name }}</option>
                                                @endif
                                              @endif
                                            @endforeach
                                        </select>
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
                                    <td style="width: 80px"><input type="number" value="{{ $value->qty }}" id="quantity<?php echo $count;?>" min="1" name="requisitions[<?php echo $count;?>][3]" class="form-control" required></td>
                                    <?php
                                        $supplies = App\Models\Report::where('item', $value->item_id)->value('issuance_qty');
                                    ?>
                                    <td style="width: 80px"><input type="text" value="{{ $supplies }}" id="available<?php echo $count;?>" name="requisitions[<?php echo $count;?>][4]" class="form-control" readonly></td>
                                    <td><input type="text" value="{{ $value->remarks }}" id="remarks<?php echo $count;?>" name="requisitions[<?php echo $count;?>][5]" class="form-control"></td>
                                    <td style="width: 80px"><a class="btn btn-sm delete_item btn-danger" data-toggle="modal" data-target="#deleteModal" data-url="{{ url('/employee/requisitions/delete/item').'/'.$value->id }}">Delete</a></td>
                                    <input type="hidden" name="requisitions[<?php echo $count;?>][6]" value="{{ $value->id }}">
                                </tr>
                                <?php $count++;?>
                            @endforeach
                            <input type="hidden" id="count" value="<?php echo $count;?>">
                        @endif
                    </tbody>
                </table>
                <div class="btn-group" style="margin-bottom: 10px;">
                    <input type="button" value="Add Requisition Item" class="btn btn-sm btn-outline-primary" id="add-requisition-item-button">
                    <button class="btn btn-sm btn-primary" style="background-color:forestgreen;">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Yes, delete</button>
                <input type="hidden" id="deleteUrlInput">
            </div>
        </div>
    </div>
</div>



<script>
    var count = $('#count').val();
    function textFill(select){
        var supply = @JSON($reports);
        var index = $(select).data("id");
        var item_id = $(select).val();
        for(var i = 0; i<supply.length; i++){
            if(supply[i]['item'] == item_id){
                $('#stock_no'+index).val(supply[i]['stock_no']);
                $('#available'+index).val(supply[i]['balance']);
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
                            +'<option value="" disabled selected>Select</option>'
                                +'@if($units = App\Models\Unit::get())'
                                    +'@foreach($units as $unit)'
                                        +'<option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>'
                                    +'@endforeach'
                                +'@endif'
                        +'</select>'
                    +'</td>'
                    +'<td style="width: 80px"><input type="number" id="quantity' + count + '" name="requisitions[' + count + '][3]" min="1" class="form-control" required></td>'
                    +'<td style="width: 80px"><input type="text" id="available' + count + '" name="requisitions[' + count + '][4]" class="form-control" readonly></td>'
                    +'<td><input type="text" id="remarks' + count + '" name="requisitions[' + count + '][5]" class="form-control"></td>'
                    +'<td><a class="btn btn-sm btn-danger delete-row-button">Delete</a></td>'
                    +'<input type="hidden" name="requisitions[' + count + '][6]" value="">'
                +'</tr>'
            );
            count++;
        });
        //delete
        $('#myTable').on('click', '.delete-row-button', function() {
          $(this).closest('tr').remove();
        });
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
        
        $('.delete_item').on('click',function(){
            var url = $(this).data('url');
            $('#deleteUrlInput').val(url);
        })
        $('#confirmDeleteBtn').on('click', function () {
            // Retrieve the URL from the hidden input
            var url = $('#deleteUrlInput').val();
            
            $.ajax({
                url: url,
                type: 'GET',
                success:function(resp){
                  console.log('delete');
                    location.reload();
                },
                error: function (error) {
                    // Handle the error response
                    console.log(error);
                }
            })
        });

</script>
@endsection