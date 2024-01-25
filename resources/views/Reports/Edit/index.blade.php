@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Edit Report</h3>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.reports.edit.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{ $report->id }}">
                        <label for="department">Department</label>
                      <select type="" name="department" class="form-control" required>
                          @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    @if($department->id == $report->id)
                                        <option value="{{ $department->id }}" selected> {{ $department->department_user }}</option>
                                    @else
                                        <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                                    @endif
                                @endforeach
                          @endif
                      </select>
                  </div>

                    <!-- Item Selection -->
                     <div class="card-body">
                       <label for="item">Item</label>
                          <select type="" name="item" class="form-control" required>
                             @if($items = App\Models\Item::get())
                                  @foreach($items as $item)
                                    @if($item->id == $report->item)
                                        <option value="{{ $item->id }}" selected> {{ $item->items_name }}</option>
                                    @else
                                        <option value="{{ $item->id }}"> {{ $item->items_name }}</option>
                                    @endif
                                 @endforeach
                             @endif
                        </select>
                   </div>
                  
                    <!-- Description -->
                    <input type="hidden" name="description" value="">
                    <div class="card-body">
                        <label for="description">Description</label>
                        <input type="text" id="description" value="{{ $report->description }}" name="description" class="form-control">
                    </div>

                    <!-- Stock Number Selection -->
                     <div class="card-body">
                        <label for="stock_no">Stock No.</label>
                        <select name="stock_no" class="form-control" required>
                            @if($supplies = App\Models\Supply::with('item')->get())
                                @foreach($supplies as $supply)
                                    @if($supply->stock_number == $report->stock_no)
                                        <option value="{{ $supply->id }}" selected>{{ $supply->stock_number }}</option>
                                    @else
                                        <option value="{{ $supply->id }}">{{ $supply->stock_number }}</option>
                                    @endif                             
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Date -->
                    <div class="card-body">
                        <label for="date">Date</label>
                        <input type="date" name="date" value="{{ date('Y-m-d', strtotime($report->created_at)) }}" class="form-control">
                    </div>

                    <!-- Reference -->
                    <div class="card-body">
                        <label for="reference">Reference</label>
                        <input type="text" name="reference" value="{{ $report->reference }}" class="form-control">
                    </div>

                    <!-- Receipt Quantity -->
                    <!-- Office Selection -->
                    <div class="card-body">
                        <label for="office">Office</label>
                        <select type="" name="office" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    @if($department->id == $report->department)
                                        <option value="{{ $department->id }}" selected> {{ $department->department_user }}</option>
                                        @else
                                            <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                                        @endif
                                @endforeach
                            @endif
                        </select>
                    </div>

                    <!-- Balance -->
                    <div class="card-body">
                        <label for="balance">Receipt Quantity</label>
                        <input type="number" name="receipt_qty" class="form-control" value="{{ $report->receipt_qty }}">
                    </div>

                    <!-- Days to Consume -->
                    <div class="card-body">
                        <label for="days_to_consume">Days to Consume</label>
                        <input type="date" name="days_to_consume" class="form-control" value="{{ $report->days_to_consume }}">
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
