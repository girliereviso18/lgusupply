@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Division</h3> 
            </div>
              <div class="card-body">
                <form action="{{ route('admin.divisions.edit.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$division->id}}"> 
                    <div class="form-group">
                        <label for="division_name">Division</label>
                        <input type="text" name="division_name" value="{{ $division->division_name}}" required="required" class="form-control">
                        <div class="form-group">
                         <label for="description">Description</label>
                            <input type="text" name="description" value="{{ $division->description}}"  required="required" class="form-control">
                        </div>                 
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