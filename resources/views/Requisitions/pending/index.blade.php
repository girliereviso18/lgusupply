@extends('layouts.default')

@section('content')
<style>
    .btndisapproved:hover{
        background-color: #bd9b02 !important;
    }
</style>
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
                                            <th>Divison Id</th>
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
                                                        <i class="fa fa-edit"></i> Edit
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
                                                        <span class=" btn btn-sm btn-warning btndisapproved" onclick="disapproved('{{ route('admin.disapprove.index', ['id' => $requisition->id]) }}')" style="cursor:pointer;">
                                                            <i class="fa fa-times"></i> Disapprove
                                                        </span>
                                                        <!-- <a class="btn btn-sm btn-warning btndisapproved" href="{{ route('admin.disapprove.index', ['id' => $requisition->id]) }}">
                                                        </a> -->
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
    function disapproved(url){
        Swal.fire({
            title: "Are you sure you want to DISAPPROVED this?",
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: "Yes",
            confirmButtonColor: "#e02f2f"
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire("Disapproved!", "", "success");
                $.ajax({
                    url: url,
                    method: "GET",
                    cache: false,
                    error: function(err) {
                        console.log(err);
                        alert_toast("An error occurred.", 'error');
                    },
                    success: function(resp) {
                        location.reload();
                    }
                });
            } 
        });
    }
    $(document).ready(function(){
        $('.delete_data').click(function(e){
            e.preventDefault();
            var _thisUrl =$(this).attr('data-url');

            Swal.fire({
                title: "Are you sure you want to DELETE this?",
                showDenyButton: false,
                showCancelButton: true,
                confirmButtonText: "Yes",
                confirmButtonColor: "#e02f2f"
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire("Disapproved!", "", "success");
                    $.ajax({
                        url: _thisUrl,
                        method: "GET",
                        cache: false,
                        error: function(err) {
                            console.log(err);
                            alert_toast("An error occurred.", 'error');
                        },
                        success: function(resp) {
                            location.reload();
                        }
                    });
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
    
    $('.btnDisapproved').on('click',function(){
        
    })


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