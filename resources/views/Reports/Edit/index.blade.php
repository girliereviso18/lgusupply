@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Report</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('reports.edit.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $report->id }}">

                    <!-- Item Selection -->
                    <div class="form-group">
                        <label for="item">Item</label>
                        <select name="item" required="required" class="form-control">
                            <option value="" disabled selected>Select Item code</option>
                            @if($items = App\Models\Item::get())
                                @foreach($items as $item)
                                    @if($item->id==$report->item)
                                        <option value="{{ $item->id }}" selected> {{ $report->item }} - {{ $item->id }}</option>
                                    @else
                                        <option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->items_number }}</option>
                                    @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Description -->
                    <input type="hidden" name="description" value="">
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" id="description" name="description" class="form-control">
                    </div>

                    <!-- Stock Number Selection -->
                     <div class="form-group">
                        <label for="stock_no">Stock No.</label>
                        <select name="stock_no" class="form-control" required>
                            @if($supplies = App\Models\Supply::with('item')->get())
                                @foreach($supplies as $supply)
                                    <option value="{{ $supply->id }}"> 
                                        {{ $supply->stock_number }} 
                                    </option>
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Date -->
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" name="date" value="{{ $report->date }}" class="form-control" required="required">
                    </div>

                    <!-- Reference -->
                    <div class="form-group">
                        <label for="reference">Reference</label>
                        <input type="text" name="reference" value="{{ $report->reference }}" class="form-control"required="required">
                    </div>

                    <!-- Receipt Quantity -->
                    <div class="form-group">
                        <label for="receipt_qty">Receipt Qty</label>
                        <input type="date" name="receipt_qty" class="form-control" value="{{ $report->receipt_qty }}">
                    </div>

                    <!-- Issuance Quantity -->
                    <div class="form-group">
                        <label for="issuance_qty">Issuance Qty</label>
                        <input type="date" name="issuance_qty" class="form-control" value="{{ $report->issuance_qty }}">
                    </div>

                    <!-- Office Selection -->
                    <div class="form-group">
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

                    <!-- Balance -->
                    <div class="form-group">
                        <label for="balance">Balance</label>
                        <input type="text" name="balance" class="form-control" value="{{ $report->balance }}">
                    </div>

                    <!-- Days to Consume -->
                    <div class="form-group">
                        <label for="days_to_consume">Days to Consume</label>
                        <input type="text" name="days_to_consume" class="form-control" value="{{ $report->days_to_consume }}">
                    </div>

                    <!-- Save Button -->
                    <div class="card-footer py-1 text-center">
                        <button class="btn btn-flat btn-primary" type="submit" style="background-color: green">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection