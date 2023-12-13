@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px; max-width: 14000px">
     @include('layouts.partials.messages')
    <div class="row p-1" style="justify-content: center;"> 
        <div class="col-sm-15">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Department</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.departments.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Department</label>
                            <input type="text" name="department_user" class="form-control" required="required">
                        </div>
                         <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required="required">
                        </div>
                         <div class="form-group">
                            <label>Responsibility Code</label>
                            <input type="text" name="responsibility_code" class="form-control" required="required">
                        </div>
                         <div class="form-group">
                            <label>Designation</label>
                            <input type="text" name="designation" class="form-control" required="required">
                        </div>
                         <div class="form-group">
                            <label>Contact No.</label>
                            <input type="text" name="contact_number" class="form-control" required="required">
                        </div>
                         <div class="form-group">
                            <label>Email Address</label>
                            <input type="text" name="email_address" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-outline-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Department Lists</h3>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <table class="table table-bordered table-stripped"> 
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Dept.</th>
                                             <th>Name</th>
                                              <th>RC Code</th>
                                              <th>Designation</th>
                                             <th>Contact No.</th>
                                              <th>Email Add</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="{{$count=1}}">
                                        @if(isset($departments))
                                            @foreach($departments as $department)
                                                 <tr>
                                                   <td>{{$count++}}</td>
                                                   <td>{{ $department->department_user }}</td>
                                                    <td>{{ $department->name }}</td>
                                                   <td>{{ $department->responsibility_code }}</td>
                                                    <td>{{ $department->designation }}</td>
                                                   <td>{{ $department->contact_number }}</td>
                                                   <td>{{ $department->email_address }}</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-success" href="{{ url('/admin/departments/edit').'/'.$department->id}}" ><i class="fa fa-edit"></i> Update</a>
                                                        <a class="btn btn-sm btn-danger delete_data" href="" data-url="{{ url('/admin/departments/delete').'/'.$department->id}})"><i class="fa fa-trash-alt"></i> Delete</a></td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 <link href="{{asset('modalalert/jquery-ui.css')}}" rel="stylesheet" />
<script src="{{asset('modalalert/jquery-ui.min.js')}}"></script>
<script>
    $(document).ready(function(){
        $('.delete_data').click(function(e){

            e.preventDefault();
            var _thisUrl =$(this).attr('data-url');
            var message = "Are you sure you want to delete?"
              $('<div></div>').appendTo('body')
                .html('<div><h6>' + message + '?</h6></div>')
                .dialog({
                  modal: true,
                  title: 'Delete message',
                  zIndex: 10000,
                  autoOpen: true,
                  width: 'auto',
                  resizable: false,
                  buttons: {
                    Yes: function() {
                      // $(obj).removeAttr('onclick');                                
                      // $(obj).parents('.Parent').remove();
                       $.ajax({
                        url: _thisUrl,
                        method:"GET",
                        error:err=>{
                            console.log(err)
                            alert_toast("An error occured.",'error');
                        },
                        success:function(resp){
                            location.reload();
                        }
                    })

                      // $('body').append('<h1>Confirm Dialog Result: <i>Yes</i></h1>');
                      $(this).dialog("close");
                    },
                    No: function() {
                      $('body').append('<h1>Confirm Dialog Result: <i>No</i></h1>');

                      $(this).dialog("close");
                    }
                  },
                  close: function(event, ui) {
                    $(this).remove();
                  }
                });
        })
        $('.view_details').click(function(){
            uni_modal("Receiving Details","receiving/view_receiving.php?id="+$(this).attr('data-id'),'mid-large')
        })
        $('.table td,.table th').addClass('py-1 px-2 align-middle')
        $('.table').dataTable();
    })

  
</script>

@endsection