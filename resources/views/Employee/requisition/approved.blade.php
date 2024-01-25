@extends('layouts.user')
<style>
    .modal-dialog{
        max-width: 90% !important;
    }
</style>
@section('content')

  <div class="container" style="margin-top: 52px;max-width: 1400px">
        <div class="col-sm-12">
               <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Requisition Approve Lists</h3>
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
                                            <th>Action</th>
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
                                                    <button class="btn btn-primary btnView" data-toggle="modal" data-url="{{ route('employee.requisition.items',['id' => $requisition->id]) }}" data-target="#viewModal"><i class="fa fa-eye" aria-hidden="true"></i> View</button>
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
<div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewModalLabel">View Requisition</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="row" style="flex-direction: column;">
                        <div class="col-sm-12">
                            <div class="card card-outline card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Requisition Slip</h3>
                                </div>
                                <div class="card-body">
                                    @csrf
                                    <input type="hidden" name="id" value="{{ $requisition->id}}">
                                    <div class="container row" style="margin: 0;">
                                        <div class="col-md-12 row">
                                            <div class="col-md-4 form-group">
                                                <label for="entity_name">Entity Name:</label>
                                                <input type="text" name="entity_name" readonly value="{{ $requisition->entity_name }}" class="form-control" required>
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="fund_cluster">Fund Cluster:</label>
                                                <input type="text" name="fund_cluster" readonly value="{{ $requisition->fund_cluster }}" class="form-control">
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="division_id">Division:</label>
                                                @if($div = App\Models\Division::where('id',$requisition->division_id)->value('division_name'))
                                                    <input type="text" class="form-control" readonly value="{{ $div }}">
                                                    <input type="hidden" name="division_id" class="form-control" value="{{ $requisition->division_id }}">
                                                @endif
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="rc_code">RC Code:</label>
                                                @if($departments = App\Models\Department::where('id',$requisition->rc_code)->value('responsibility_code'))
                                                    <input type="text" class="form-control" readonly value="{{ $departments }}">
                                                    <input type="hidden" name="rc_code" class="form-control" value="{{ $requisition->rc_code }}">
                                                @endif
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="office_id">Office:</label>
                                                @if($departments = App\Models\Department::where('id',$requisition->rc_code)->value('department_user'))
                                                    <input type="text" class="form-control" readonly value="{{ $departments }}">
                                                    <input type="hidden" name="office_id" class="form-control" value="{{ $requisition->rc_code }}">
                                                @endif
                                            </div>
                                            <div class="col-md-4 form-group">
                                                <label for="purpose">Purpose:</label>
                                                <textarea name="purpose" class="form-control" rows="4" readonly >{{ $requisition->purpose }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <table class="table2 table-bordered" id="myTable2" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Stock No</th>
                                        <th>Item Description</th>
                                        <th>Unit ID</th>
                                        <th>Quantity</th>
                                        <th>Available</th>
                                        <th>Remarks</th>
                                    </tr>
                                </thead>
                                <tbody id="requisition-items-container">
                                    
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

        $('.btnView').on('click',function(){
            var _thisUrl = $(this).data('url');
            $.ajax({
                url: _thisUrl,
                method: "GET",
                cache: false,
                error: function(err) {
                    console.log(err);
                    alert_toast("An error occurred.", 'error');
                },
                success: function(resp) {
                    console.log(resp)
                    var html = '';
                    for(var i=0;i<resp.length; i++ ){
                        html =' <tr>'
                                +'<td style="width: 100px;">'
                                    +'<input type="text" value="'+resp[i]['stock_no']+'"class="form-control" readonly>'
                                +'</td>'
                                +'<td>' 
                                    +'<input type="text" value="'+resp[i]['item_id']+'"class="form-control" readonly>'
                                +'</td>'
                                +'<td style="width: 140px">'
                                    +'<input type="text" value="'+resp[i]['unit_id']+'"class="form-control" readonly>'

                                +'</td>'
                                +'<td style="width: 80px"><input type="number" value="'+resp[i]['qty']+'" class="form-control" readonly></td>'
                                +'<td style="width: 80px"><input type="text" value="'+resp[i]['balance']+'" class="form-control" readonly></td>'
                                +'<td><input type="text" value="'+(resp[i]['remarks'] ? resp[i]['remarks'] : "")+'" class="form-control"></td>'
                                +'</tr>'
                        $('#requisition-items-container').append(html);
                    }
                }
            });
        })
    })
</script>

@endsection