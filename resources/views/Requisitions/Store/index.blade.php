@extends('layouts.default')

@section('content')

    <form action="{{ route('admin.requisitions.store') }}" method="POST">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-6">
                    @include('Requisitions.Store._requisition')
                </div>
                <div class="col-sm-6">
                    @include('Requisitions.Store._requisition_items')
                    <div class="btn-group">
                        <a class="btn btn-sm btn-outline-primary" id="add-requisition-item-button">Add Requisition Item</a>
                        <button class="btn btn-sm btn-primary" style="background-color:forestgreen;">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        var count=1;
        $('#myTable').on('click', '.delete-row-button', function() {
          $(this).closest('tr').remove();
        });
        $('#add-requisition-item-button').on('click', function(){
            $('.requisitionfield').append('<tr><td><select name="requisitions['+ count +'][0]" class="form-control" required>'
                    +'@if(isset($supplies))'
                        +'@foreach($supplies as $supply)'
                            +'<option value="{{ $supply->id }}">'
                                +'{{ $supply->stock_number }}'
                            +'</option>'
                        +'@endforeach'
                    +'@endif'
                +'</select>'
                +'</td>'
                +'<td><select name="requisitions['+ count +'][1]" id="unit" class="form-control" required>'
                        +'<option value="" disabled selected>Select Unit Name</option>'
                            +'@if(isset($units))'
                                +'@foreach($units as $unit)'
                                    +'<option value="{{ $unit->id }}"selected> {{ $unit->unit_name }}</option>'
                                +'@endforeach'
                            +'@endif'
                    +'</select>'
                +'</td>'
                +'<td>'
                    +'<select type="" name="requisitions['+ count +'][2]" class="form-control" required>'
                        +'@if(isset($items))'
                            +'@foreach($items as $item)'
                                +'<option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->id }}</option>'
                            +'@endforeach'
                        +'@endif'
                    +'</select>'
                +'</td>'
                +'<td><input type="number" name="requisitions['+ count++ +'][3]" class="form-control" required></td>'
                +'<td><a class="btn btn-sm btn-danger delete-row-button">Delete</a></td></tr>');
        });
    </script>
@endsection