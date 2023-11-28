@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Supplier</h3> 
            </div>
              <div class="card-body">
                <form action="{{ route('admin.suppliers.edit.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$supplier->id}}"> 
                    <div class="form-group">
                        <label for="suppliers_name">Supplier's Name</label>
                        <input type="text" name="suppliers_name" value="{{ $supplier->suppliers_name}}" required="required" class="form-control">                 
                    </div>
                     <div class="form-group">
                        <label for="contact_number">Contact Number</label>
                        <input type="text" name="contact_number" value="{{ $supplier->contact_number}}" required="required" class="form-control">                 
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" value="{{ $supplier->address}}" required="required" class="form-control">                 
                    </div>
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