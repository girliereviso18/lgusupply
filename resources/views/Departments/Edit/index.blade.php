@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"style="color: #ff69b4; font-weight: bold;">Update Department</h3> 
            </div>
              <div class="card-body">
                <form action="{{ route('admin.departments.edit.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$department->id}}"> 
                    <div class="form-group">
                        <label for="department">Department</label>
                        <input type="text" name="department_user" value="{{ $department->department_user}}" required="required" class="form-control" >                 
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $department->name}}" required="required" class="form-control" >                 
                    </div>
                     <div class="form-group">
                        <label for="responsibility_code">Responsibility Code</label>
                        <input type="text" name="responsibility_code" value="{{ $department->responsibility_code}}" required="required" class="form-control" >                 
                    </div>
                     <div class="form-group">
                        <label for="contact_number">Designation</label>
                        <input type="text" name="designation" value="{{ $department->designation}}" required="required" class="form-control" >                 
                    </div>

                    <div class="form-group">
                        <label for="contact_number">Contact No.</label>
                        <input type="text" name="contact_number" value="{{ $department->contact_number}}" required="required" class="form-control" >                  
                    </div>
                     <div class="form-group">
                        <label for="email_address">Email Address</label>
                        <input type="text" name="email_address" value="{{ $department->email_address}}" required="required" class="form-control" >                 
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