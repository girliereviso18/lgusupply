@extends('layouts.default')

@section('content')

  <div class="container" style="margin-top: 52px; max-width: 1400px;">
        <div class="col-sm-12">
               <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Requisition Disapproved Lists</h3>
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

@endsection