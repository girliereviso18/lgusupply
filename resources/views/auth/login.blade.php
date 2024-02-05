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
                            <button type="submit" class="btn btn-primary btn-block">Log In</button>
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

  
       
    </form>
      </div>
    </div>
  </div>
  <script src="{{asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <footer class="text-center mt-5">
        <p>BITS &copy; {{ date('Y') }}</p>
        <br> </br>
       <p>Developed by <a href="https://www.facebook.com/girliesiervoflorida.reviso/">ガーリー・レヴィソ</a></p>
    </footer>

    <!-- Your existing scripts, if any -->
    <script src="{{asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
@endsection