@extends('layouts.default')

@section('content')
     <!-- Main content -->
        <section class="content ">
          <div class="container-fluid">
            <br>
            <div>
            <br>
            <br>
            <h1 style="text-align: center;">Welcome to Supply Management System </h1> 
        </br>
        <hr>
        <div class="row">
            <div class="col-4 col-sm-4 col-md-3">
                <div class="info-box bg-light shadow">
                    <span class="info-box-icon bg-yellow elevation-1"><i class="fas fa-table"></i></span>
                    <div class="info-box-content">
                    <a href="{{route('admin.stocks.index')}}" target="_blank"><span class="info-box-text">Stock Lists</span></a>
                    @if($nOsupply=App\Models\Supply::count())
                    <span class="info-box-number">
                    {{$nOsupply}}
                    </span>
                    @endif
                  </div>
            </div>  
        </div>
        
        <div class="col-4 col-sm-4 col-md-3">
            <div class="info-box bg-light shadow">
                <span class="info-box-icon bg-red elevation-1"><i class="fas fa-box"></i></span>
                    <div class="info-box-content">
                    <a href="{{ route('admin.items.index') }}" target="_blank"><span class="info-box-text">Items</span></a>
                    @if($nOitem=App\Models\Item::count())
                    <span class="info-box-number">
                    {{ $nOitem }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
  

               
    
            <div class="col-4 col-sm-4 col-md-3">
                <div class="info-box bg-light shadow">
                <span class="info-box-icon bg-gray elevation-1"><i class="fas fa-ruler"></i></span>
                    <div class="info-box-content">
                    <a href="{{route('admin.units.index')}}" target="_blank"><span class="info-box-text">Units</span></a>
                     @if($nOunit=App\Models\Unit::count())
                    <span class="info-box-number">
                    {{$nOunit}}
                    </span>
                     @endif
                 </div>
                    <!-- /.info-box-content -->
            </div>
        </div>
         <div class="col-4 col-sm-4 col-md-3">
            <div class="info-box bg-light shadow">
                <span class="info-box-icon bg-blue elevation-1"><i class="fas fa-toolbox"></i></span>
                    <div class="info-box-content">
                    <a href="{{ route('admin.categories.index') }}" target="_blank"><span class="info-box-text">Categories</span></a>
                    @if($nOcategory=App\Models\Category::count())
                    <span class="info-box-number">
                    {{ $nOcategory }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
         <div class="col-4 col-sm-4 col-md-3">
            <div class="info-box bg-light shadow">
                <span class="info-box-icon bg-pink elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                    <a href="{{ route('admin.suppliers.index') }}" target="_blank"><span class="info-box-text">Suppliers</span></a>
                    @if($nOsupplier=App\Models\Supplier::count())
                    <span class="info-box-number">
                    {{ $nOsupplier }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-4 col-sm-4 col-md-3">
            <div class="info-box bg-light shadow">
                <span class="info-box-icon bg-cyan elevation-1"><i class="fas fa-file"></i></span>
                    <div class="info-box-content">
                    <a href="{{ route('admin.requisitions.index') }}" target="_blank"><span class="info-box-text">Requisitions</span></a>
                    @if($nOrequisition=App\Models\Requisition::count())
                    <span class="info-box-number">
                    {{ $nOrequisition }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
  

        <div class="col-4 col-sm-4 col-md-3">
            <div class="info-box bg-light shadow">
                <span class="info-box-icon bg-green elevation-1"><i class="fas fa-user"></i></span>
                    <div class="info-box-content">
                    <a href="{{ route('admin.users.index') }}" target="_blank"><span class="info-box-text">Users</span></a>
                    @if($nOuser=App\Models\User::count())
                    <span class="info-box-number">
                    {{ $nOuser }}
                    </span>
                    @endif
                </div>
            </div>
        </div>

           <div class="col-4 col-sm-4 col-md-3">
            <div class="info-box bg-light shadow">
                <span class="info-box-icon bg-orange elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                    <a href="{{ route('admin.departments.index') }}" target="_blank"><span class="info-box-text">Departments</span></a>
                    @if($nOdepartment=App\Models\Department::count())
                    <span class="info-box-number">
                    {{ $nOdepartment }}
                    </span>
                    @endif
                </div>
            </div>
        </div>

         <div class="col-4 col-sm-4 col-md-3">
            <div class="info-box bg-light shadow">
                <span class="info-box-icon bg-black elevation-1"><i class="fas fa-file"></i></span>
                    <div class="info-box-content">
                    <a href="{{ route('admin.reports.index') }}" target="_blank"><span class="info-box-text">Reportss</span></a>
                    @if($nOreport=App\Models\Report::count())
                    <span class="info-box-number">
                    {{ $nOreport }}
                    </span>
                    @endif
                </div>
            </div>
        </div>
  
          <!--   <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-light shadow">
                    <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-exchange-alt"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">BO Records</span>
                    <span class="info-box-number text-right">
                        4            </span>
                    </div> -->
                    <!-- /.info-box-content -->
        <!--     </div>
            
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-light shadow">
                    <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-undo"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Return Records</span>
                    <span class="info-box-number text-right">
                        1            </span>
                    </div>
                     /.info-box-content -->
              
                <!-- /.info-box -->
           <!--  </div> -->
            <!-- <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-light shadow">
                    <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file-invoice-dollar"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Sales Records</span>
                    <span class="info-box-number text-right">
                        1            </span>
                    </div> --> 
                    <!-- /.info-box-content -->
              <!--   </div> -->
                <!-- /.info-box -->
           <!--  </div>
            <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-light shadow">
                    <span class="info-box-icon bg-navy elevation-1"><i class="fas fa-truck-loading"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Suppliers</span>
                    <span class="info-box-number text-right">
                        2            </span>
                    </div> -->
          
                    <!-- /.info-box-content -->
               <!--  </div> -->
                <!-- /.info-box -->
           <!--  </div>
                <div class="col-12 col-sm-6 col-md-3">
                <div class="info-box bg-light shadow">
                    <span class="info-box-icon bg-teal elevation-1"><i class="fas fa-users"></i></span>

                    <div class="info-box-content">
                    <span class="info-box-text">Users</span>
                    <span class="info-box-number text-right">
                        2            </span>
                    </div> -->
                    <!-- /.info-box-content -->
               <!--  </div> -->
                <!-- /.info-box -->
          <!--   </div>
            </div>          </div>
                </section> --> 
                <!-- /.content -->
          <div class="modal fade" id="confirm_modal" role='dialog'>
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Confirmation123</h5>
              </div>
              <div class="modal-body">
                <div id="delete_content"></div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id='confirm' onclick="">Continue</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="uni_modal" role='dialog'>
            <div class="modal-dialog modal-md modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title"></h5>
              </div>
              <div class="modal-body">
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" id='submit' onclick="$('#uni_modal form').submit()">Save</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
              </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="uni_modal_right" role='dialog'>
            <div class="modal-dialog modal-full-height  modal-md" role="document">
              <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span class="fa fa-arrow-right"></span>
                </button>
              </div>
              <div class="modal-body">
              </div>
              </div>
            </div>
          </div>
          <div class="modal fade" id="viewer_modal" role='dialog'>
            <div class="modal-dialog modal-md" role="document">
              <div class="modal-content">
                      <button type="button" class="btn-close" data-dismiss="modal"><span class="fa fa-times"></span></button>
                      <img src="" alt="">
              </div>
            </div>
          </div>
@endsection