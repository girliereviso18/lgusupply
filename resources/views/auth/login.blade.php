@extends('layouts.auth')

@section('content')
    <h1 class="text-center py-5 login-title"><b>Supply Management System - Bontoc</b></h1>
    @include('layouts.partials.messages') 
    <form class="" method="POST" action="{{route('login.perform')}}">
        @csrf
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card card-outline card-primary">
                <div class="card-header text-center">
                  <a href="./" class="h1"><b>Login</b></a>
                </div>
                <div class="card-body">
                    <p class="login-box-msg">Welcome to Bontoc Management Supply</p>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" autofocus name="username" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row d-flex flex-row-reverse">
                        <div class="col-4">
                            <button type="button" class="btn btn-primary btn-block" data-bs-toggle="modal" data-bs-target="#exampleModal"  data-toggle="modal" data-target="#myModal">Register</button>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>
                        
                        <!-- /.col -->
                    </div>
                </div>
            </div>
                <!-- /.card -->
        </div><!-- /.login-box -->
    </form>
  
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Register</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
            <form method="post" action="{{ route('register.perform') }}">

                <center><input type="hidden" name="_token" value="{{ csrf_token() }}" />
                  <div class="form-group form-floating mb-3">
                     <input type="name" class="form-control" name="name" value="{{ old('name') }}" placeholder="Name" required="required" autofocus>
                     @if ($errors->has('name'))
                         <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                     @endif
                 </div>
         
                 <div class="form-group form-floating mb-3">
                     <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required="required" autofocus>
                     @if ($errors->has('email'))
                         <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                     @endif
                 </div>
         
                 <div class="form-group form-floating mb-3">
                     <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required="required" autofocus>
                     @if ($errors->has('username'))
                         <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                     @endif
                 </div>
                 
                 <div class="form-group form-floating mb-3">
                     <input type="password" class="form-control" name="password" value="{{ old('password') }}" placeholder="Password" required="required">
                     @if ($errors->has('password'))
                         <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                     @endif
                 </div>
         
                 <div class="form-group form-floating mb-3">
                     <input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" placeholder="Confirm Password" required="required">
                     @if ($errors->has('password_confirmation'))
                         <span class="text-danger text-left">{{ $errors->first('password_confirmation') }}</span>
                     @endif
                 </div>
                <div class="form-group form-floating mb-3">
                 <label for="role">Role</label>
                    <input type="role" class="form-control" name="role" value="{{ old('role') }}" placeholder="Role" required="required">
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>      
             
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
            <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
        </div>
    </form>
      </div>
    </div>
  </div>
  <script src="{{asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endsection