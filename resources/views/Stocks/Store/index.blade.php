@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
              <div class="col-sm-12">
                <div class="card card-outline card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Stocks</h3>
                  </div>
                  <div class="card-body">
                    <form action="{{ route('stocks.store') }}" method="POST">
                      @csrf
                      <input type="hidden" name="item_number" value="">
                      <div class="form-group">
                        <label for="stock_number">Stock Number</label>
                        <input type="text" id="stock_number" name="stock_number" class="form-control">
                      </div>
    
                      <div class="form-group">
                        <label for="item_id">Item Name</label>
                        <datalist id="item_id" >
                             <!-- <option value="" disabled selected>Select Item name</option> -->
                             @if($items = App\Models\Item::get())
                             @foreach($items as $item)
                              <option value="{{ $item->id }}"> {{ $item->items_name }}</option>
                            @endforeach
                          @endif
                        </datalist>

                        <input type="text" name="item_id" autocomplete="on" list="item_id" class="form-control">
                      </div>

                      <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" id="qty" name="qty" class="form-control">
                      </div>
                      <div class="form-group">
                            <label>Unit of Measurement</label>
                             <select name="unit_of_measurement" id="unit_of_measurement" class="form-control" required="required">
                             <option value="" disabled selected>Select Unit Name</option>
                             @if($units = App\Models\Unit::get())
                             @foreach($units as $unit)
                              <option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>
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
                            <label>Price per Unit</label>
                            <input type="text" name="price_per_unit" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                        <label for="date_of_purchase">Date of Purcahse</label>
                        <input type="date" id="date_of_purchase" name="date_of_purchase" class="form-control" required="required">

                      <div class="form-group">
                        <label for="expiration_date">Expiration Date</label>
                        <input type="date" id="expiration_date" name="expiration_date" class="form-control" required="required">
                      </div>

                      <!-- <div class="form-group">
                        <label for="location">Location</label>
                        <input type="text" id="location" name="location" class="form-control">
                      </div> -->

                      <div class="form-group">
                        <label for="status">Status</label>
                       <select name="status" id="status" class="form-control">
                             <option value="0">Inactive</option>
                             <option value="1" selected>Active</option>
                        </select>
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