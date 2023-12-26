<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Items</h3>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="myTable">
            <thead>
                <tr>
                    <th>Stock No</th>
                    <th>Unit ID</th>
                    <th>Item Description</th>
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
                    <td> 
                        <select type="" id="item_name0" name="requisitions[0][2]" onchange="textFill(this)" data-id="0" class="form-control" required>
                            <option value="-1" disabled selected>Please Select</option>
                            @if($items = App\Models\Item::get())
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}"> {{ $item->items_name }}</option>
                                @endforeach
                            @endif

                        </select>
                    </td>
                    <td style="width: 80px"><input type="number" id="quantity0" name="requisitions[0][3]" class="form-control" required></td>
                    <td style="width: 80px"><input type="text" id="available0" name="requisitions[0][4]" class="form-control" readonly></td>
                    <td><input type="text" id="remarks0" name="requisitions[0][5]" class="form-control"></td>
                    <td style="width: 80px"><input type="text" name="requisitions[0][6]" class="form-control" readonly></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript">
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
    
</script>