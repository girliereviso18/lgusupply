@extends('layouts.user')

@section('content')

  <div class="container" style="margin-top: 52px;">
        <div class="col-sm-12">
               <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Requisition Lists</h3>
                    <div class="card-tools">
                </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <table class="table table-bordered table-stripped"> 
                                            <thead>
                                        <tr>
                                            <th>Entity Name</th>
                                            <th>Fund Cluster </th>
                                            <th>Divison Id</th>
                                            <th>RC Code</th>
                                            <th>Office</th>
                                            <th>Purpose</th>
                                            <th>Actions</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(isset($requisitions))
                                            @foreach($requisitions as $requisition)
                                                 <tr>
                                                   <td>{{ $requisition->entity_name }}</td>
                                                   <td>{{ $requisition->fund_cluster}}</td>
                                                   <td>{{ $requisition->division_id }}</td>
                                                   <td>{{ $requisition->rc_code }}</td>
                                                   <td>{{ $requisition->office_id }}</td>
                                                   <td>{{ $requisition->purpose}}</td>
                                                  <td class="text-center">
                                                    <a class="btn btn-sm btn-success" href="{{ url('/user/requisitions/edit').'/'.$requisition->id}}">
                                                        <i class="fa fa-edit"></i> Update
                                                    </a>
                                                    <a class="btn btn-sm btn-danger delete_data" href="" data-url="{{ url('employee/requisitions/delete').'/'.$requisition->id}}">
                                                        <i class="fa fa-trash-alt"></i> Delete
                                        
                                                </td>
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
<script src="{{asset('modalalert/ jquery-ui.min.js')}}"></script>
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