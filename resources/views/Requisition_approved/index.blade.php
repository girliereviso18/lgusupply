@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Approved Requisitions</div>

                    <div class="card-body">
                        @if($approvedRequisitions->isEmpty())
                            <p>No approved requisitions available.</p>
                        @else
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Requisition ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($approvedRequisitions as $approvedRequisition)
                                        <tr>
                                            <td>{{ $approvedRequisition->id }}</td>
                                            <td>{{ $approvedRequisition->requisition_id }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection