<!DOCTYPE html>
<html lang="en" class="content dashboard-background" style="height: auto;">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Municipality of Bontoc Supply Management System </title>
    <link rel="icon" href="{{asset('adminassets/uploads/Bontoc.png')}}">
    <!-- Google Font: Source Sans Pro -->
    <!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback"> -->
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('adminassets/plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Ionicons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('adminassets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
      <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('adminassets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminassets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminassets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
   <!-- Select2 -->
  <link rel="stylesheet" href="{{asset('adminassets/plugins/select2/css/select2.min.css')}}">
  <link rel="stylesheet" href="{{asset('adminassets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('adminassets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('adminassets/plugins/jqvmap/jqvmap.min.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('adminassets/dist/css/adminlte.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/dist/css/custom.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('adminassets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('adminassets/plugins/daterangepicker/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('adminassets/plugins/summernote/summernote-bs4.min.css')}}">
     <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{asset('adminassets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css')}}">
    <style type="text/css">/* Chart.js */
      @keyframes chartjs-render-animation{from{opacity:.99}to{opacity:1}}.chartjs-render-monitor{animation:chartjs-render-animation 1ms}.chartjs-size-monitor,.chartjs-size-monitor-expand,.chartjs-size-monitor-shrink{position:absolute;direction:ltr;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1}.chartjs-size-monitor-expand>div{position:absolute;width:1000000px;height:1000000px;left:0;top:0}.chartjs-size-monitor-shrink>div{position:absolute;width:200%;height:200%;left:0;top:0}
    </style>

     <!-- jQuery -->
    <script src="{{asset('adminassets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="{{asset('adminassets/plugins/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- SweetAlert2 -->
    <script src="{{asset('adminassets/plugins/sweetalert2/sweetalert2.min.js')}}"></script>
    <!-- Toastr -->
    <script src="{{asset('adminassets/plugins/toastr/toastr.min.j')}}"></script>
    <script>
        var _base_url_ = 'http://localhost/bontoc-supply-management system/';
    </script>
    <script src="{{asset('adminassets/dist/js/script.js')}}"></script>

  </head>  <body class="sidebar-mini layout-fixed control-sidebar-slide-open layout-navbar-fixed sidebar-mini-md sidebar-mini-xs" data-new-gr-c-s-check-loaded="14.991.0" data-gr-ext-installed="" style="height: auto;">
    <div class="wrapper">
     <style>
  .user-img{
        position: absolute;
        height: 27px;
        width: 27px;
        object-fit: cover;
        left: -7%;
        top: -12%;
  }
  .btn-rounded{
        border-radius: 50px;

  }
  .dashboard-background {
    background-image: url('public/adminassets/uploads/mncpyo.jpg');
    background-size: cover;
    background-position: center;
}
.notif{
    font-size: 9px;
    padding: 3px 8px;
    background-color: #cc1414;
    color: #fff;
    border-radius: 20px;
    margin-left: 5px;
    padding-bottom: 5px;
}


@media (min-width: 1000px){
  /* .col-md-3 {
      -ms-flex: 0 0 25%;
      flex: 0 0 25%;
      max-width: 65%;
  } */
}
</style>
<!-- Navbar -->
      <nav class="main-header navbar navbar-expand navbar-green border border-light border-top-0  border-left-0 border-right-0 navbar-light text-sm green">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="" class="nav-link" style="font-weight: bold;">Municipality of Bontoc Supply Management System-User</a>
</li>

        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
        <!--   Navbar Search -->
         <!--  <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">
              <form class="form-inline">
                <div class="input-group input-group-sm">
                  <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                  <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                    </button>
                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </li> --> 
          <!-- Messages Dropdown Menu -->
          <li class="nav-item">
            <div class="btn-group nav-link">
                  <button type="button" class="btn btn-rounded badge badge-light dropdown-toggle dropdown-icon" data-toggle="dropdown">
                  <span class="ml-3">{{ $username = App\Models\User::where('id',session('user_id'))->value('name') }}</span>
                    <span class="sr-only">Toggle Dropdown</span>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout.perform')}}"><span class="fas fa-sign-out-alt"></span> Logout</a>
                  </div>
              </div>
          </li>
          <li class="nav-item">
            
          </li>
         <!--  <li class="nav-item">
            <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
            </a>
          </li> -->
        </ul>
      </nav>
      <!-- /.navbar -->     </style>
<!-- Main Sidebar Container -->
      <aside class="main-sidebar sidebar-dark-primary elevation-4 sidebar-no-expand">
        <!-- Brand Logo -->
        <a href="" class="brand-link bg-primary text-sm">
        <img src="{{asset('adminassets/uploads/Bontoc.png')}}" alt="Store Logo" class="brand-image img-circle elevation-3 bg-black" style="width: 1.8rem;height: 1.8rem;max-height: unset">
        <span class="brand-text font-weight-light">Bontoc Supply</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-transition os-host-scrollbar-horizontal-hidden">
          <div class="os-resize-observer-host observed">
            <div class="os-resize-observer" style="left: 0px; right: auto;"></div>
          </div>
          <div class="os-size-auto-observer observed" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer"></div>
          </div>
          <div class="os-content-glue" style="margin: 0px -8px; width: 249px; height: 646px;"></div>
          <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll;">
              <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                <!-- Sidebar user panel (optional) -->
                <div class="clearfix"></div>
                <!-- Sidebar Menu -->
                <nav class="mt-4">
                   <ul class="nav nav-pills nav-sidebar flex-column text-sm nav-compact nav-flat nav-child-indent nav-collapse-hide-child" data-widget="treeview" role="menu" data-accordion="false">
                    <div> <li class="nav-item dropdown"style="color:white;font-weight: bold; font-size: 18px;">
                      <a href="{{ route('home.index')}}" class="nav-link nav-home">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                          Dashboard
                        </p>
                      </a>
                    </li>
                   </div>
              
                     <div>
                        <li class="nav-header"style="color:white;font-weight: bold; font-size: 18px;" margin-buttom: 10px;>Requisition</li>
                         <li class="nav-form dropdown">
                          <li class="nav-form">
                            <a href="{{ route('employee.requisition.add')}}" class="nav-link nav-form">
                            <i class="fas fa-plus" style="margin-left: 10px;"></i>
                              <p>
                                Add Requisition
                             </p>
                          </a>
                        </li>
                      </div>
                      <div>
                         <li class="nav-form dropdown">
                          <li class="nav-form">
                            <a href="{{ route('employee.requisition.pending')}}" class="nav-link nav-form">
                            <i class="fas fa-clock" style="margin-left: 10px;"></i>
                              <p>
                             Pending
                             </p>
                          </a>
                        </li>
                      </div>
                      <div>
                         <li class="nav-form dropdown">
                          <li class="nav-form">
                            <a href="{{ route('employee.requisition.approved')}}" onclick="approvedNotif()" class="nav-link nav-form">
                            <i class="fas fa-check" style="margin-left: 10px;"></i>
                              <p>
                                Approved
                                <?php 
                                $countOfNewApproved = App\Models\Requisition::where('requested_by', session('user_id'))->where('status','approved')->where('employee_new_approved',3)->count();
                                if($countOfNewApproved > 0){
                                ?>
                                  <span class="notif" id="newApproved">New <?php echo $countOfNewApproved;?></span>
                                <?php } ?>
                             </p>
                          </a>
                        </li>
                      </div>
                      <div>
                         <li class="nav-form dropdown">
                          <li class="nav-form">
                            <a href="{{ route('employee.requisition.disapproved')}}" onclick="disapprovedNotif()" class="nav-link nav-form">
                            <i class="fas fa-times" style="margin-left: 10px;"></i>
                              <p>
                                Disapproved
                                <?php 
                                $countOfNewdisapproved = App\Models\Requisition::where('requested_by', session('user_id'))->where('status','disapproved')->where('employee_new_disapproved',3)->count();
                                if($countOfNewdisapproved > 0){
                                ?>
                                  <span class="notif" id="newDisapproved">New <?php echo $countOfNewdisapproved;?></span>
                                <?php } ?>
                             </p>
                          </a>
                        </li>
                      </div>
                      <div>
                        <li class="nav-header" style="color:white;font-weight: bold; font-size: 18px;"style="padding: 0;margin-top: 10px;">
                          <a href="{{ route('employee.stockCard.index')}}" style="padding: 0;" class="nav-link nav-form">
                            <i class="fas fa-archive" style="margin-left: 10px;"></i>
                              <p>
                               Reports
                             </p>
                          </a>
                        </li>
                      </div>

                             
           
          </div>
          <div class="os-scrollbar-corner"></div>
        </div>
        <!-- /.sidebar -->
      </aside>
      <script>
        var page;
    $(document).ready(function(){
      
    $('#receive-nav').click(function(){
      $('#uni_modal').on('shown.bs.modal',function(){
        $('#find-transaction [name="tracking_code"]').focus();
      })
      uni_modal("Enter Tracking Number","transaction/find_transaction.php");
    })
    })
 </script>         
           <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper pt-3" style="min-height: 567.854px;">
        @yield('content')
      </div>

<script>
  $(document).ready(function(){
     window.viewer_modal = function($src = ''){
      start_loader()
      var t = $src.split('.')
      t = t[1]
      if(t =='mp4'){
        var view = $("<video src='"+$src+"' controls autoplay></video>")
      }else{
        var view = $("<img src='"+$src+"' />")
      }
      $('#viewer_modal .modal-content video,#viewer_modal .modal-content img').remove()
      $('#viewer_modal .modal-content').append(view)
      $('#viewer_modal').modal({
              show:true,
              backdrop:'static',
              keyboard:false,
              focus:true
            })
            end_loader()  

  }
    window.uni_modal = function($title = '' , $url='',$size=""){
        start_loader()
        $.ajax({
            url:$url,
            error:err=>{
                console.log()
                alert("An error occured")
            },
            success:function(resp){
                if(resp){
                    $('#uni_modal .modal-title').html($title)
                    $('#uni_modal .modal-body').html(resp)
                    if($size != ''){
                        $('#uni_modal .modal-dialog').addClass($size+'  modal-dialog-centered')
                    }else{
                        $('#uni_modal .modal-dialog').removeAttr("class").addClass("modal-dialog modal-md modal-dialog-centered")
                    }
                    $('#uni_modal').modal({
                      show:true,
                      backdrop:'static',
                      keyboard:false,
                      focus:true
                    })
                    end_loader()
                }
            }
        })
    }
    window._conf = function($msg='',$func='',$params = []){
       $('#confirm_modal #confirm').attr('onclick',$func+"("+$params.join(',')+")")
       $('#confirm_modal .modal-body').html($msg)
       $('#confirm_modal').modal('show')
    }
    
  })
  function approvedNotif(){
      $.ajax({
          url: "{{ route('employee.approved.notification', ['id' => session('user_id')]) }}",
          method: "GET",
          cache: false,
          error: function(err) {
              console.log(err);
              alert_toast("An error occurred.", 'error');
          },
          success: function() {
            // console.log(resp);
            $('#newApproved').hide(300);
          }
      });
    }
    function disapprovedNotif(){
      $.ajax({
          url: "{{ route('employee.disapproved.notification', ['id' => session('user_id')]) }}",
          method: "GET",
          cache: false,
          error: function(err) {
              console.log(err);
              alert_toast("An error occurred.", 'error');
          },
          success: function() {
            // console.log(resp);
            $('#newDisapproved').hide(300);
          }
      });
    }
</script>
<br> </br>
        <br> </br>
        <br> </br>
        <br> </br>
        <br> </br>
 <footer class="text-center mt-5">
        <p>BITS &copy; {{ date('Y') }}</p>
        <br> </br>
        
      
       <p>Developed by <a href="https://www.facebook.com/girliesiervoflorida.reviso/">ガーリー・レヴィソ</a></p>
    </footer>
    </div>
    <!-- ./wrapper -->
   
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('adminassets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->
    <script src="{{asset('adminassets/plugins/chart.js/Chart.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('adminassets/plugins/sparklines/sparkline.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('adminassets/plugins/select2/js/select2.full.min.js')}}"></script>
    <!-- JQVMap -->
    <script src="{{asset('adminassets/plugins/jqvmap/jquery.vmap.min.js')}}"></script>
    <script src="{{asset('adminassets/plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
    <!-- jQuery Knob Chart -->
    <script src="{{asset('adminassets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{asset('adminassets/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('adminassets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{asset('adminassets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{asset('adminassets/plugins/summernote/summernote-bs4.min.js')}}"></script>
    <script src="{{asset('adminassets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('adminassets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('adminassets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('adminassets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <!-- overlayScrollbars -->
    <!-- <script src="http://localhost/sms/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script> -->
    <!-- AdminLTE App -->
    <script src="{{asset('adminassets/dist/js/adminlte.js')}}"></script>
    <div class="daterangepicker ltr show-ranges opensright">
      <div class="ranges">
        <ul>
          <li data-range-key="Today">Today</li>
          <li data-range-key="Yesterday">Yesterday</li>
          <li data-range-key="Last 7 Days">Last 7 Days</li>
          <li data-range-key="Last 30 Days">Last 30 Days</li>
          <li data-range-key="This Month">This Month</li>
          <li data-range-key="Last Month">Last Month</li>
          <li data-range-key="Custom Range">Custom Range</li>
        </ul>
      </div>
      <div class="drp-calendar left">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-calendar right">
        <div class="calendar-table"></div>
        <div class="calendar-time" style="display: none;"></div>
      </div>
      <div class="drp-buttons"><span class="drp-selected"></span><button class="cancelBtn btn btn-sm btn-default" type="button">Cancel</button><button class="applyBtn btn btn-sm btn-primary" disabled="disabled" type="button">Apply</button> </div>
    </div>
    <div class="jqvmap-label" style="display: none; left: 1093.83px; top: 394.361px;">Idaho</div>  </body>
</html>