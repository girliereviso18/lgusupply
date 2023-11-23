@extends('layouts.default')

@section('content')
  
    <div class="container" style="margin-top: 52px;">
        <div class="col-sm-12">
               <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Item Lists</h3>
                    <div class="card-tools">
                    <a href="{{route('additem.index')}}"class="btn btn-flat btn-primary" target="_blank"><span class="fas fa-plus"></span> Add Items</a>
                </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <table class="table table-bordered table-stripped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Item Name and Brand</th>
                                            <th>Barcode</th>
                                            <th>Category_name</th>
                                            <th>Description</th>
                                            <th>Action</th>


                                        </tr>
                                    </thead>
                                    <tbody class="{{$count=1}}">
                                        @if(isset($items))
                                            @foreach($items as $item)
                                                 <tr>
                                                   <td>{{$count++}}</td>
                                                   <td>{{ $item->items_name }}</td>
                                                   <td>{{ $item->barcode}}</td>
                                                   <td>{{ $item->category->category_name}}</td>
                                                   <td>{{ $item->description }}</td>
                                                   <td class="text-center">
                                                  <a class="btn btn-sm btn-success" href="{{ url('/items/edit').'/'.$item->id}}" ><i
                                                 class="fa fa-edit"></i> Update</a>
                                                 <a class="btn btn-sm btn-danger delete_data" href="" data-url="{{ url('/items/delete').'/'.$item->id}})"><i
                                                 class="fa fa-trash-alt"></i> Delete</a></td>
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