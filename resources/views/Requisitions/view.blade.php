@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"style="color: #ff0000; font-weight: bold;">Requisition Details</h3>
            </div>
            <div class="card-body">
                <form>
                    @csrf
                    <h1 style="color: #8a2be2; font-weight: bold;">Requisition Form</h1>
                    <div class="form-group">
                        <label for="entity_name">Entity Name:</label>
                        <p>{{ $requisition->entity_name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="fund_cluster">Fund Cluster:</label>
                        <p>{{ $requisition->office_id }}</p>
                 
                  <div class="form-group">
                        <label>Division:</label>
                        <p>{{ $requisition->division->division_name }}</p>
                    </div>
            
                    <div class="form-group">
                         <label>RC Code:</label>
                        <p>{{ $requisition->office->responsibility_code }}</p>
                    </div>
                    <div class="form-group">
                        <label for="">Office:</label>
                        <p>{{ $requisition->office->department_user }}</p>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose:</label>
                        <p>{{ $requisition->purpose }}</p>
                    </div>
                     <hr>
                   <div class="form-group">
                        <label for="requested_by"style="color: #ff0000; font-weight: bold;">REQUESTED BY</label>
                    </div>
                    <div class="form-group">
                        <label for="requested_printed_name">Printed Name:</label>
                        <p>{{$requisition->office->name }}</p>
                    </div>
                    <div class="form-group">
                        <label for="requested_designation">Designation:</label>
                        <?php
                            $dep = App\Models\Department::where('id', $requisition->received_designation)->value('department_user');
                        ?>
                        <p>{{ $dep }}</p>
                    </div>
                  </hr>
                <hr>
                   <div class="form-group">
                        <label for="received_by"style="color: #ff0000; font-weight: bold;">RECEIVED BY</label>
                    </div>
                     <div class="form-group">
                        <label for="received_printed_name">Printed Name:</label>
                        <p>{{ $requisition->received_printed_name }}</p>
                    </div>
                     <div class="form-group">
                        <label for="received_designation">Designation:</label>
                        <p>{{ $dep }}</p>
                    </div>
                    </hr>

                    <table class="table table-bordered" id="myTable">
                        <thead>
                            <tr>
                                <th>Stock No</th>
                                <th>Unit ID</th>
                                <th>Item ID</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody class="requisitionfield" id="requisition-items-container">
                            @foreach($requisitionitems as $value)
                            <tr>
                                <td> 
                                    <input type="text" name="stock_no" class="form-control" value="{{ $value->stock_no }}" readonly>
                                </td>
                                <td>
                                    <input type="" name="unit" id="unit" class="form-control" value="{{ $value->unit_id }}" readonly>
                                </td>
                                <td> 
                                    <input type="" name="item" class="form-control" readonly value="{{ $value->item_id }}">

                                </td>
                                <td>
                                    <input type="text" name="qty" class="form-control" value="{{ $value->qty }}" readonly>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                <a href="{{ route('admin.requisitions.index') }}" class="btn btn-primary">Back</a>
                <a href="#" class="btn btn-success" onclick="customPrint('{{ route('admin.requisition.print', ['id' => $requisition->id]) }}')">Print</a>
                <a class="btn btn-sm approved btn-info"  data-toggle="modal" data-target="#approvedModal" data-url="{{ route('admin.approved.index', ['id' => $requisition->id]) }}" href="">
                    <i class="fa fa-check"></i> Approve
                </a>
                <a class="btn btn-sm btn-warning" href="{{ route('admin.requisitions.disapproved', ['id' => $requisition->id]) }}">
                    <i class="fa fa-times"></i> Disapprove</a>

            </div>
        </div>
    </div>
</div>

@include('Requisitions.approved_modal')

<script type="text/javascript">
    function customPrint(url) {
        
         fetchAndPrintContent(url);
    }
    function fetchAndPrintContent(url) {
      fetch(url)
        .then(function(response) {
          return response.text();
        })
        .then(function(content) {
          printContent(content);
        })
        .catch(function(error) {
          console.error('Error fetching content:', error);
        });
    }

    function printContent(content) {
      const printWindow = window.open('', '', 'width=1000,height=800');
      printWindow.document.open();
      printWindow.document.write(content);
      printWindow.document.close();
      printWindow.print();
      printWindow.close();
    }

    $('#approvedModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var url = button.data('url'); // Extract info from data-* attributes
        $('#approveLink').attr('href', url); // Set the href of the modal button
    });

</script>
@endsection