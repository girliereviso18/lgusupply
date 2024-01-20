@extends('layouts.default')

@section('content')
<div class="container" style="margin-top: 52px;">
  <div class="col-sm-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Reports</h3>
      </div>

      <div class="card-body">
        <form action="{{ route('admin.reports.store') }}" method="POST">
          @csrf
           <input type="hidden" name="id" value="department">
            <label for="department">Department</label>
          <select type="" name="department" onchange="setItems(this)" class="form-control" required>
            <option value="-1" disabled selected>Please Select</option>
              @foreach($departments as $department)
                  <option value="{{ $departmentId = $department->id }}"> {{ $department->department_user }}</option>
              @endforeach
          </select>
      </div>
        <div class="card-body">
          <label for="item">Item</label>
          <select type="" name="item" id="items"  onchange="textFill(this)" class="form-control" required>
            <option value="-1" disabled selected>Please Select</option>
             
          </select>
        </div>
          <div class="card-body">
            <label for="description">Description</label>
            <input type="text" id="description" name="description" class="form-control">
          </div>

        <div class="card-body">
                <label for="stock_no">Stock No.</label>
                <input type="text" class="form-control" name="stock_no" id="stock_no" readonly>
            </div>

          <div class="card-body">
            <label for="date">Date</label>
            <input type="date" id="date" name="date" class="form-control">
          </div>

          <div class="card-body">
            <label for="reference">Reference</label>
            <input type="text" id="reference" name="reference" class="form-control">
          </div>
          <div class="card-body">
            <label>Available</label>
            <input type="number" id="available" class="form-control" readonly>
          </div>
          <div class="card-body">
            <label>Receipt Qty</label>
            <input type="number" name="receipt_qty" id="receipt_qty"  onchange="validate(this)" class="form-control" required>
          </div>
          <div class="card-body">
            <label for="office">Office</label>
             <select type="" name="office" class="form-control" required>
                            <option value="" disabled selected>Select Department</option>
                             @if($departments = App\Models\Department::get())
                             @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                            @endforeach
                          @endif
                      </select>
                      </div>
          <div class="card-body">
            <label for="days_to_consume">Days to Consume</label>
            <input type="text" id="days_to_consume" name="days_to_consume" class="form-control">
          </div>

          <div class="card-footer py-1 text-center">
            <button class="btn btn-flat btn-primary" type="submit" style="background-color: green">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

<script>
  function textFill(select){
    var supplies = @JSON($supplies);
    var item_id = $(select).val();
    $('#description').val($(select).find('option:selected').data('description'));
    for(var i = 0; i<supplies.length; i++){
        if(supplies[i]['item_id'] == item_id){
            $('#stock_no').val(supplies[i]['stock_number']);
            $('#available').val(supplies[i]['qty']);
            break;
        }
    }
  }
  function validate(element) {
    var available = $('#available').val();
    if (available !== "") {
      var qnty = parseInt($(element).val());
      
      if (isNaN(qnty) || qnty <= 0) {
        // Handle invalid input (non-numeric or negative)
        $(element).val("");
      } else if (qnty > parseInt(available)) {
        // If quantity is greater than available, set it to the available quantity
        $(element).val(available);
      }
    } else {
      $(element).val("");
    }
  }
  function setItems(data){
    var id = $(data).val();
    $.ajax({
        url: "{{ route('admin.reports.department') }}",
        method: "GET",
        cache: false,
        data: { id: id },
        error: function(err) {
            console.log(err);
            alert_toast("An error occurred.", 'error');
        },
        success: function(resp) {
            var html = '';
            for(var i = 0; i<resp.items.length; i++){
                html += '<option value="'+resp.items[i]['id']+'" data-description="'+resp.items[i]['description']+'">'+ resp.items[i]['item'] +' </option>';
            }
            $('#items').append(html);
        }
    });
  }
  $('#receipt_qty').on('change',function(){
    
  })
</script>
