@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
     @include('layouts.partials.messages')
    <div class="row p-1"> 
        <div class="col-sm-5">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Suppliers</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('admin.suppliers.store')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Supplier's Name</label>
                            <input type="text" name="suppliers_name" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="text" name="contact_number" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <input type="text" name="status" class="form-control" required="required">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-sm btn-outline-primary" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-sm-7">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Supplier Lists</h3>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <table class="table table-bordered table-stripped"> 
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Supplier's Name</th>
                                            <th>Contact Number</th>
                                            <th>Address</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="{{$count=1}}">
                                        @if(isset($suppliers))
                                            @foreach($suppliers as $supplier)
                                                 <tr>
                                                   <td>{{$count++}}</td>
                                                   <td>{{ $supplier->suppliers_name }}</td>
                                                   <td>{{ $supplier->contact_number}}</td>
                                                   <td>{{ $supplier->address}}</td>
                                                   <td>{{ $supplier->status }}</td>
                                                    <td class="text-center">
                                                        <a class="btn btn-sm btn-success" href="{{ url('/admin/suppliers/edit').'/'.$supplier->id}}" ><i class="fa fa-edit"></i> Update</a>
                                                        <a class="btn btn-sm btn-danger delete_data" href="" data-url="{{ url('/admin/suppliers/delete').'/'.$supplier->id}})"><i class="fa fa-trash-alt"></i> Delete</a></td>
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

    // function delete_receiving($id){
    //     start_loader();
    //     $.ajax({
    //         url:_base_url_+"classes/Master.php?f=delete_receiving",
    //         method:"POST",
    //         data:{id: $id},
    //         dataType:"json",
    //         error:err=>{
    //             console.log(err)
    //             alert_toast("An error occured.",'error');
    //             end_loader();
    //         },
    //         success:function(resp){
    //             if(typeof resp== 'object' && resp.status == 'success'){
    //                 location.reload();
    //             }else{
    //                 alert_toast("An error occured.",'error');
    //                 end_loader();
    //             }
    //         }
    //     })
    // }
</script>

@endsection