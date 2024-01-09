@extends('layouts.default')

@section('content')

  <div class="container" style="margin-top: 52px; max-width: 1400px;">
        <div class="col-sm-12">
               <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title" style="color: #8a2be2; font-weight: bold;">Requisition Approved Lists</h3>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="container-fluid">
                            <table class="table table-bordered table-stripped"> 
                                    <thead>
                                        <tr>
                                            <th>Requested by</th>
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
                                                    <td>{{ $requisition->requested_printed_name }}</td>
                                                    <td>{{ $requisition->entity_name }}</td>
                                                    <td>{{ $requisition->fund_cluster}}</td>
                                                    <td>{{ $requisition->division->division_name }}</td>
                                                    <td>{{ $requisition->office->responsibility_code}}</td>
                                                    <td>{{ $requisition->office->department_user }}</td>
                                                    <td>{{ $requisition->purpose}}</td>
                                                    <td class="text-center">
                                                    <a class="btn btn-sm btn-primary view_data" href="{{ url('/admin/requisitions/view').'/'.$requisition->id}}">
                                                        <i class="fa fa-eye"></i> View
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
<script>
    $(document).ready(function(){
        $('.view_details').click(function(){
            uni_modal("Receiving Details","receiving/view_receiving.php?id="+$(this).attr('data-id'),'mid-large')
        })
        $('.table td,.table th').addClass('py-1 px-2 align-middle')
        $('.table').dataTable();
    })
</script>

@endsection