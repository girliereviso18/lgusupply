@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Report Details</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Description</th>
                            <th>Stock No.</th>
                            <th>Date</th>
                            <th>Reference</th>
                            <th>Receipt Qty</th>
                            <th>Issuance Qty</th>
                            <th>Office</th>
                            <th>Balance</th>
                            <th>Days to Consume</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if(isset($reports))
                          @foreach($reports as $value)
                            <tr>
                                <td>{{ $report->item }}</td>
                                <td>{{ $report->description }}</td>
                                <td>{{ $report->stock_no }}</td>
                                <td>{{ $report->date }}</td>
                                <td>{{ $report->reference }}</td>
                                <td>{{ $report->receipt_qty }}</td>
                                <td>{{ $report->issuance_qty }}</td>
                                <td>{{ $report->office }}</td>
                                <td>{{ $report->balance }}</td>
                                <td>{{ $report->days_to_consume }}</td>
                                <td> <a href="{{ route('reports.index') }}" class="btn btn-primary">Back</a>
                                     <a href="#" class="btn btn-success" onclick="print('{{ route('reports.print', ['id'=>$report->id])}}')">Print</a>
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
@endsection