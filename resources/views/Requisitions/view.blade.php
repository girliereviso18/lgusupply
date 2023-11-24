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
                        <input type="text" name="entity_name" class="form-control" value="{{ $requisition->entity_name }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="fund_cluster">Fund Cluster:</label>
                         <label type="text" name="fund_cluster" class="form-control" value="{{ $requisition->office_id }}" readonly>
                        @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </label>
                    </div>
                    <div class="form-group">
                        <label for="division_id">Division:</label>
                        <input type="text" name="division_id" class="form-control" value="{{ $requisition->division_id }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="rc_code">RC Code:</label>
                       <label type="text" name="office_id" class="form-control" value="{{ $requisition->office_id }}" readonly>
                        @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}-{{ $department->responsibility_code }}</option>
                            @endforeach
                          @endif
                      </label>
                      </div>
                    <div class="form-group">
                        <label for="office_id">Office:</label>
                        <label type="text" name="office_id" class="form-control" value="{{ $requisition->office_id }}" readonly>
                        @if($departments = App\Models\department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </label>
                    </div>
                    <div class="form-group">
                        <label for="purpose">Purpose:</label>
                        <input type="text" name="purpose" class="form-control" value="{{ $requisition->purpose }}" readonly>
                    </div>
                   <div class="form-group">
                        <label for="requested_by">Requested By:</label>
                        <input type="text" name="requested_by" class="form-control" value="{{ $requisition->requested_by }}" readonly>
                    </div>
                   <div class="form-group">
                        <label for="date_requested">Date Requested:</label>
                        <input type="text" name="date_requested" class="form-control" value="{{ $requisition->date_requested }}" readonly>
                    </div>
                   <div class="form-group">
                        <label for="approved_by">Approved By:</label>
                        <input type="text" name="approved_by" class="form-control" value="{{ $requisition->approved_by }}" readonly>
                    </div>
                   <div class="form-group">
                        <label for="approved_date">Approved Date:</label>
                        <input type="text" name="approved_date" class="form-control" value="{{ $requisition->approved_date }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="issued_by">Issued By:</label>
                        <input type="text" name="issued_by" class="form-control" value="{{ $requisition->issued_by }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="issued_date">Issued Date:</label>
                        <input type="text" name="issued_date" class="form-control" value="{{ $requisition->issued_date }}" readonly>
                    </div>
                   <div class="form-group">
                        <label for="received_by">Receieved By:</label>
                        <input type="text" name="received_by" class="form-control" value="{{ $requisition->received_by }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="received_date">Received Date:</label>
                        <input type="text" name="received_date" class="form-control" value="{{ $requisition->received_date }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="isapproved">Is Approved:</label>
                        <input type="text" name="isapproved" class="form-control" value="{{ $requisition->isapproved }}" readonly>
                    </div>

                     @if(isset($requisition_items))
                      @foreach($requisition_items as $value)

                     <div class="form-group">
                        <label for="stock_no">Stock No:</label>
                        <label type="text" name="stock_no" class="form-control" value="{{ $requisition_item->stock_no }}" readonly>
                        @if($supplies = App\Models\Supply::get())
                             @foreach($supplies as $supply)
                              <option value="{{ $supply->id }}">{{ $supply->stock_number }}</option>
                            @endforeach
                          @endif
                      </label>
                    </div>
                   <div class="form-group">
                        <label for="unit_id">Unit Id:</label>
                        <label name="unit" id="unit" class="form-control" readonly>
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
                        <label type="" name="item" class="form-control" readonly>
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
                <a href="{{ route('requisitions.index') }}" class="btn btn-primary">Back</a>
                 <a href="#" class="btn btn-success" onclick="print('{{ route('requisition.print', ['id'=>$requisition->id])}}')">Print</a>
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