@extends('layouts.user')

@section('content')

  <div class="container" style="margin-top: 52px;max-width: 1400px">
        <div class="col-sm-12">
               <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Stock List</h3>
                    <div class="card-tools">
                </div>
                </div>
                <div class="card-body">
                    <div class="container-fluid">
                        <div class="container-fluid">
                        <table class="table table-bordered table-stripped"> 
                                            <thead>
                                        <tr>
                                           <!--  <th>#</th> -->
                                            <th>Item </th>
                                            <th>Description</th>
                                            <th>Stock no.</th>
                                            <th>Date</th>
                                            <th>Reference</th>
                                            <th>Receipt qty</th>
                                            <th>Issuance qty</th>
                                            <th>Office</th>
                                            <th>Balance</th>
                                             <th>Days to consume</th>

                                        </tr>
                                    </thead>
                                    <tbody class="{{$count=1}}">
                                        @if(isset($reports))
                                            @foreach($reports as $report)
                                                 <tr>
                                                    <td>{{ $report->item}}</td>
                                                    <td>{{ $report->description}}</td>
                                                    <td>{{ $report->stock_no }}</td>
                                                    <td>{{ $report->date }}</td>
                                                    <td>{{ $report->reference }}</td>
                                                    <td>{{ $report->receipt_qty}}</td>
                                                    <td>{{ $report->issuance_qty}}</td>
                                                    <td>{{ $report->office }}</td>
                                                    <td>{{ $report->balance }}</td>
                                                    <td>{{ $report->days_to_consume }}</td>
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

</script>

@endsection