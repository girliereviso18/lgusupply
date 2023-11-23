@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Update Users</h3> 
            </div>
              <div class="card-body">
                <form action="{{ route('users.edit.save') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$user->id}}"> 
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" value="{{ $user->name}}" required="required" class="form-control">                 
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" value="{{ $user->email}}" required="required" class="form-control">                 
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" value="{{ $user->username}}" required="required" class="form-control">                 
                    </div>
                    
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" value="{{ $user->password}}" required="required" class="form-control">                 
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <input type="text" name="role" value="{{ $user->role}}" required="required" class="form-control">                 
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