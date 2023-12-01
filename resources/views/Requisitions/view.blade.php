@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
    <div class="col-sm-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Requisition Details</h3>
            </div>
            <div class="card-body">
                <form>
                    @csrf
                    <h1>Requisition Form</h1>
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
                        <p>{{ $requisition->office_id }}</p>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose:</label>
                        <p>{{ $requisition->purpose }}</p>
                    </div>
                   <div class="form-group">
                        <label for="requested_by">Requested By:</label>
                        <p>{{ $requisition->user->name }}</p>
                    </div>
                   <div class="form-group">
                        <label for="date_requested">Date Requested:</label>
                        <p>{{ $requisition->date_requested }}</p>
                    </div>
                   <div class="form-group">
                        <label for="approved_by">Approved By:</label>
                        <p>{{ $requisition->approved_by }}</p>
                    </div>
                   <div class="form-group">
                        <label for="approved_date">Approved Date:</label>
                        <p>{{ $requisition->approved_date }}</p>
                    </div>
                    <div class="form-group">
                        <label for="issued_by">Issued By:</label>
                        <p>{{ $requisition->issued_by }}</p>
                    </div>
                    <div class="form-group">
                        <label for="issued_date">Issued Date:</label>
                        <p>{{ $requisition->issued_date }}</p>
                    </div>
                   <div class="form-group">
                        <label for="received_by">Receieved By:</label>
                        <p>{{ $requisition->received_by }}</p>
                    </div>
                    <div class="form-group">
                        <label for="received_date">Received Date:</label>
                        <p>{{ $requisition->received_date }}</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="isapproved">Is Approved:</label>
                        <p>{{ $requisition->isapproved }}</p>                   
                    </div>

                     @if(isset($requisition_items))
                      @foreach($requisition_items as $value)

                     <div class="form-group">
                        <label for="stock_no">Stock No:</label>
                        <input type="text" name="stock_no" class="form-control" value="{{ $requisition_item->stock_no }}" readonly>
                        @if($supplies = App\Models\Supply::get())
                             @foreach($supplies as $supply)
                              <option value="{{ $supply->id }}">{{ $supply->stock_number }}</option>
                            @endforeach
                          @endif
                      </label>
                    </div>
                   <div class="form-group">
                        <label for="unit_id">Unit Id:</label>
                        <input type=""> name="unit" id="unit" class="form-control" readonly>
                            @if($units = App\Models\unit::get())
                                @foreach($units as $unit)
                                  <option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>
                                @endforeach
                            @endif> name="unit" id="unit" class="form-control" required>
                            @if($units = App\Models\unit::get())
                                @foreach($units as $unit)
                                  <option value="{{ $unit->id }}"> {{ $unit->unit_name }}</option>
                                @endforeach
                            @endif
                       </label>
                    </div>
                    <div class="form-group">
                        <label for="item_id">Item Id:</label>
                        <input type="" name="item" class="form-control" readonly>
                          @if($items = App\Models\Item::get())
                              @foreach($items as $item)
                                  <option value="{{ $item->id }}"> {{ $item->items_name }} - {{ $item->id }}</option>
                              @endforeach
                          @endif
                      </label>
                    </div>
                   <div class="form-group">
                        <label for="qty">Quantity:</label>
                        <input type="text" name="qty" class="form-control" value="{{ $requisition->qty }}" readonly>
                    </div>
                   <div class="form-group">
                        <label for="isavailable">Is Available:</label>
                        <input type="text" name="isavailable" class="form-control" value="{{ $requisition->isavailable }}" readonly>
                    </div>
                   <div class="form-group">
                        <label for="issued_qty">Issued Qty:</label>
                        <input type="text" name="issued_qty" class="form-control" value="{{ $requisition->issued_qty }}" readonly>
                    </div>
                   <div class="form-group">
                        <label for="remarks">Remarks:</label>
                        <input type="text" name="remarks" class="form-control" value="{{ $requisition->remarks }}" readonly>
                    </div>
                    @endforeach
                      @endif

                   
                </form>
                <a href="{{ route('admin.requisitions.index') }}" class="btn btn-primary">Back</a>
                <a href="#" class="btn btn-success" onclick="print('{{ route('admin.requisition.print', ['id' => $requisition->id]) }}')">Print</a>
                <a class="btn btn-sm btn-info" href="{{ route('admin.requisitions.approve', ['id' => $requisition->id]) }}">
                    <i class="fa fa-check"></i> Approve</a>

                <a class="btn btn-sm btn-warning" href="{{ route('admin.requisitions.disapprove', ['id' => $requisition->id]) }}">
                    <i class="fa fa-times"></i> Disapprove</a>

            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function print(url) {
        
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
</script>
@endsection