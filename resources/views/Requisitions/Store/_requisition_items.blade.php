<table class="table table-bordered" id="myTable">
    <thead>
        <tr>
            <th>Stock No</th>
            <th>Unit ID</th>
            <th>Item ID</th>
            <th>Quantity</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="requisitionfield" id="requisition-items-container">
        <tr>
            <td> 
                <select name="requisitions[0][0]" class="form-control" required>
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
                <select name="requisitions[0][1]" id="unit" class="form-control" required>
                    <option value="" disabled selected>Select Unit Name</option>
                        @if($units = App\Models\Unit::get())
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}"selected> {{ $unit->unit_name }}</option>
                            @endforeach
                        @endif
                </select>
            </td>
            <td> 
                <select type="" name="requisitions[0][2]" class="form-control" required>
                    @if($items = App\Models\Item::get())
                        @foreach($items as $item)
                            <option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->id }}</option>
                        @endforeach
                    @endif
                </select>
            </td>
            <td><input type="number" name="requisitions[0][3]" class="form-control" required></td>
        </tr>
    </tbody>
</table>