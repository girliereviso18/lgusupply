@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Stocks</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('stocks.edit.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $stock->id }}">
                    <div class="form-group">
                        <label for="item_id">Item Code</label>
                        <select name="item_id" required="required" class="form-control">
                            <option value="" disabled selected>Select Item code</option>
                            @if($items = App\Models\Item::get())
                                @foreach($items as $item)
                                    @if($item->id==$stock->item_id)
                                        <option value="{{ $item->id }}" selected> {{ $item->items_name }} - {{ $item->id }}</option>
                                    @else
                                        <option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->items_number }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" id="qty" name="qty" value="{{ $stock->qty }}" required="required" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="unit">Unit</label>
                        <select name="unit" id="unit" class="form-control" required>
                            <option value="" disabled selected>Select Unit Name</option>
                            @if($units = App\Models\unit::get())
                                @foreach($units as $unit)
                                  <option value="{{ $unit->id }}"selected> {{ $unit->unit_name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                     <div class="form-group">
                        <label for="suppliers_name">Supplier ID</label>
                        <datalist id="suppliers_name" >
                             <!-- <option value="" disabled selected>Select Supplier</option> -->
                             @if($suppliers = App\Models\Supplier::get())
                             @foreach($suppliers as $supplier)
                              <option value="{{ $supplier->id }}"> {{ $supplier->suppliers_name }}</option>
                            @endforeach
                          @endif
                        </datalist>

                        <input type="text" name="suppliers_name" autocomplete="on" list="suppliers_name" class="form-control">
                      </div>
                    <div class="form-group">
                        <label for="price">Price per unit</label>
                        <input type="number" name="price_per_unit" value="{{ $stock->price_per_unit }}" class="form-control"required="required">
                    </div>
    

                    <div class="form-group">
                        <label for="date_received">Date Received</label>
                        <input type="date" name="date_received" class="form-control" value="{{ $stock->date_received }}">
                    </div>

                    <div class="form-group">
                        <label for="expiration_date">Expiration Date</label>
                        <input type="date" name="expiration_date" class="form-control" value="{{ $stock->expiration_date }}">
                    </div>
                    <div class="card-footer py-1 text-center">
                        <button class="btn btn-flat btn-primary" type="submit" style="background-color: green">Save</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
