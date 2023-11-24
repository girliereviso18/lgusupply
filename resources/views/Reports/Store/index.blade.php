
@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
  <div class="col-sm-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title">Reports</h3>
      </div>

      <div class="card-body">
        <form action="{{ route('reports.store') }}" method="POST">
          @csrf
           <input type="hidden" name="id" value="item">
           <label for="item">Item</label>
          <select type="" name="item" class="form-control" required>
              <!-- <option value="" disabled selected>Select Dep</option> -->
              @if($items = App\Models\Item::get())
                  @foreach($items as $item)
                      <option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->id }}</option>
                  @endforeach
              @endif
          </select>
            </div>
          <div class="card-body">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control">
          </div>

          <div class="card-body">
    <label for="stock_no">Stock No.</label>
    <select name="stock_no" class="form-control" required>
        <!-- <option value="" disabled selected>Select Stock No.</option> -->
        @if($supplies = App\Models\Supply::with('item')->get())
            @foreach($supplies as $supply)
                <option value="{{ $supply->id }}"> 
                    {{ $supply->stock_number }} 
                </option>
            @endforeach
        @endif
    </select>
</div>

          <div class="card-body">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control">
          </div>

          <div class="card-body">
            <label for="reference">Reference</label>
            <input type="text" id="reference" name="reference" class="form-control">
          </div>

          <div class="card-body">
            <label>Receipt Qty</label>
            <input type="number" name="receipt_qty" class="form-control" required="required">
          </div>

          <div class="card-body">
            <label for="issuance_qty">Issuance Qty</label>
            <input type="number" id="issuance_qty" name="issuance_qty" class="form-control" required="required">
          </div>

          <div class="card-body">
            <label for="office">Office</label>
             <select type="" name="office" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </select>
                      </div>

          <div class="card-body">
            <label for="balance">Balance</label>
            <input type="number" id="balance" name="balance" class="form-control" required="required">
          </div>

          <div class="card-body">
            <label for="days_to_consume">Days to Consume</label>
            <input type="text" id="days_to_consume" name="days_to_consume" class="form-control">
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