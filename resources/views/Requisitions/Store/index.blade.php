@extends('layouts.default')

@section('content')

    <form action="{{ route('admin.requisitions.store') }}" method="POST">
        <div class="col-sm-12">
            <div class="row" style="flex-direction: column;">
                <div class="col-sm-12">
                    @include('Requisitions.Store._requisition')
                </div>
                <div class="col-sm-12">
                    @include('Requisitions.Store._requisition_items')
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
            echo $currentDate;
        ?>">
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        function textFill(select){
            var supplies = @JSON($supplies);
            var index = $(select).data("id");
            var item_id = $(select).val();
            for(var i = 0; i<supplies.length; i++){
                if(supplies[i]['item_id'] == item_id){
                    $('#stock_no'+index).val(supplies[i]['stock_number']);
                    $('#available'+index).val(supplies[i]['qty']);
                    break;
                }
            }
            
        }
        $('.requested_by').on('change', function(){
            $('#requested_by').val($(this).find('option:selected').text());

            var dprt_id = $(this).find('option:selected').data('des');
            var departments = @JSON($departments);
            var depId = 0;
            for(var i=0; i<departments.length; i++){
                if(departments[i]['id'] == dprt_id){
                    // $('#requested_designation').val(departments[i]['department_user']);
                    depId = departments[i]['id'];
                    break
                }
            }
            var items = @JSON($items);
            $('#item_name0 option:not([value="-1"])').remove();
            $.ajax({
                url: "{{ route('admin.requisition.reports') }}",
                method: "GET",
                cache: false,
                data: { id: depId },
                error: function(err) {
                    console.log(err);
                    alert_toast("An error occurred.", 'error');
                },
                success: function(resp) {
                    var html = "";
                    for(var i=0; i<resp.items.length; i++){
                        for(var j=0; j<items.length; j++){
                            if(resp.items[i]['item'] == items[j]['id']){
                                html += '<option value="'+items[j]['id']+'">'+items[j]['items_name']+'</option>'
                                break;
                            }
                        }
                    }
                    $('#item_name0').append(html);
                }
            });

        });
        
        $('.received_by').on('change', function(){
            $('#received_by').val($(this).find('option:selected').text());
        });

        var count=1;
        $('#myTable').on('click', '.delete-row-button', function() {
          $(this).closest('tr').remove();

        });
        $('#add-requisition-item-button').on('click', function(){
            var depId = $('#requested_designation_id').val();
            var items = @JSON($items);
            if(depId == ""){
                return;
            }
            $.ajax({
                url: "{{ route('admin.requisition.reports') }}",
                method: "GET",
                cache: false,
                data: { id: depId },
                error: function(err) {
                    console.log(err);
                    alert_toast("An error occurred.", 'error');
                },
                success: function(resp) {
                    var html = "";
                    html +='<tr>'
                            +'<td style="width: 100px;">'
                                +'<input type="text" id="stock_no' + count + '" name="requisitions[' + count + '][0]" class="form-control" readonly>'
                            +'</td>'
                            +'<td>' 
                                +'<select type="" id="item_name' + count + '" name="requisitions[' + count + '][2]" onchange="textFill(this)" data-id="' + count + '" class="form-control" required>'
                                    +'<option value="-1" disabled selected>Please Select</option>';
                                    for(var i=0; i<resp.items.length; i++){
                                        for(var j=0; j<items.length; j++){
                                            if(resp.items[i]['item'] == items[j]['id']){
                                                html += '<option value="'+items[j]['id']+'">'+items[j]['items_name']+'</option>';
                                                break;
                                            }
                                        }
                                    }
                    html        +='</select>'
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
                        +'</tr>';
                    $('.requisitionfield').append(
                        html
                    );
                    count++;
                }
            });
            
        });
    </script>
@endsection