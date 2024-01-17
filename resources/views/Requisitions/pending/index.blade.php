@extends('layouts.default')

@section('content')

  <div class="container" style="margin-top: 52px; max-width: 1400px;">
        <div class="col-sm-12">
               <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="color: #8a2be2; font-weight: bold;">Requisition Pending Lists</h3>
                    <div class="card-tools">
                        <a href="{{route('admin.requisitions.addrequisitions')}}"class="btn btn-flat btn-primary" target="_blank"><span class="fas fa-plus"></span> Add Requisitions</a>
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
                                            <th>Divison </th>
                                            <th>RC Code</th>
                                            <th>Office</th>
                                            <th>Purpose</th>
                                            <th>Actions</th>
                                           
                                        </tr> @if(isset($supply->supplier->suppliers_name))
                                                    {{ $supply->supplier->suppliers_name}}
                                                @endif
                                    </thead>
                                    <tbody>
                                        @if(isset($requisitions))
                                            @foreach($requisitions as $requisition)
                                                 <tr>
                                                   <td>{{ $requisition->entity_name }}</td>
                                                   <td>{{ $requisition->fund_cluster}}</td>
                                                   <td>{{ $requisition->division->division_name }}</td>
                                                   <td>{{ $requisition->office->responsibility_code}}</td>
                                                   <td>{{ $requisition->office->department_user }}</td>
                                                   <td>{{ $requisition->purpose}}</td>
                                                   <td class="text-center">
                                                    <a class="btn btn-sm btn-success" href="{{ url('/admin/requisitions/edit').'/'.$requisition->id}}">
                                                        <i class="fa fa-edit"></i> Update
                                                    </a>
                                                    <a class="btn btn-sm btn-danger delete_data" href="" data-url="{{ url('/admin/requisitions/delete').'/'.$requisition->id}}">
                                                        <i class="fa fa-trash-alt"></i> Delete
                                                    </a>
                                                    <a class="btn btn-sm btn-primary view_data" href="{{ url('/admin/requisitions/view').'/'.$requisition->id}}">
                                                        <i class="fa fa-eye"></i> View
                                                     </a>
                                                     <a class="btn btn-sm approved btn-info"
                                                        data-toggle="modal"
                                                        data-target="#approvedModal"
                                                        data-received="{{ $requisition->received_by }}"
                                                        data-id="{{ $requisition->id }}"
                                                        data-url="{{ route('admin.approved.index', ['id' => $requisition->id]) }}"
                                                        href="#">
                                                        <i class="fa fa-check"></i> Approve
                                                    </a>
                                                        
                                                        <a class="btn btn-sm btn-warning" href="{{ route('admin.disapprove.index', ['id' => $requisition->id]) }}">
                                                            <i class="fa fa-times"></i> Disapprove
                                                        </a>
                                                    </td>
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

@include('Requisitions.approved_modal')

<!-- <link href="{{asset('modalalert/jquery-ui.css')}}" rel="stylesheet" />
<script src="{{asset('modalalert/ jquery-ui.min.js')}}"></script> -->
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

    $('#approvedModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); 
        $('#id').val(button.data('id'));
        console.log(button.data('received'));
        if(button.data('received') == ""){
            $('.received-by').show();
        }

    });
    $()
    
    $('.btnApproved').on('click', function() {
    
        var formData = $('#approved').serialize();
        $.ajax({
            url: "{{ route('admin.approved.index') }}",
            method: "POST",
            cache: false,
            data: formData,
            error: function(err) {
                console.log(err);
                alert_toast("An error occurred.", 'error');
            },
            success: function(resp) {
                alert_toast("Approved!", 'success');
                setTimeout(function(){
                    location.reload()
                },2000)
            }
        });
    });
    console.log()
</script>

@endsection