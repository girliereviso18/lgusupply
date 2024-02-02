@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Update Units</h3> 
            </div>
              <div class="card-body">
                <form action="{{ route('admin.units.edit.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$unit->id}}"> 
                    <div class="form-group">
                        <label for="unit_name">Unit Name</label>
                        <input type="text" name="unit_name" value="{{ $unit->unit_name}}" required="required">                 
                    </div>

                    <div class="card-footer py-1 text-center">
                        <button class="btn btn-flat btn-primary" type="submit" style="background-color: green">Update</button>
                    </div>
                </form>
              </div>
        </div>
    </div>
</div>
@endsection