@extends('layouts.user')

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
                <span class="info-box-icon bg-red elevation-1"><i class="fas fa-file"></i></span>
                    <div class="info-box-content">
                    <a href="{{ route('employee.requisition.index') }}" target="_blank"><span class="info-box-text">Requisitions</span></a>
                    <span class="info-box-number">
                      {{ $no_requisition = App\Models\Requisition::where('requested_by', session('user_id'))->count() }}
                    </span>
                </div>
            </div>
        </div>
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