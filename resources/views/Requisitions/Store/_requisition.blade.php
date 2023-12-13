<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Requisition Slip</h3>
    </div>
    <div class="card-body">
        @csrf
        <div class="container">
            <div class="form-group">
                <label for="entity_name">Entity Name:</label>
                <input type="text" name="entity_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fund_cluster">Fund Cluster:</label>
                <input type="text" name="fund_cluster" class="form-control">
            </div>
            <div class="form-group">
                <label for="division_id">Division:</label>
               <select type="" name="division_id" class="form-control" required>
                    <option value="" disabled selected>Select Division</option>
                     @if($divisions = App\Models\Division::get())
                     @foreach($divisions as $division)
                      <option value="{{ $division->id }}"> {{ $division->division_name }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
            <div class="form-group">
                <label for="rc_code">RC Code:</label>
                  <select type="" name="rc_code" class="form-control" required>
                    <option value="" disabled selected>Select Department</option>
                     @if($departments = App\Models\Department::get())
                     @foreach($departments as $department)
                      <option value="{{ $department->id }}"> {{ $department->department_user }}-{{ $department->responsibility_code }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
            <div class="form-group">
                <label for="office_id">Office:</label>
                <select type="" name="office_id" class="form-control" required>
                    <option value="" disabled selected>Select Department</option>
                     @if($departments = App\Models\Department::get())
                     @foreach($departments as $department)
                      <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
            <div class="form-group">
                <label for="purpose">Purpose:</label>
                <textarea name="purpose" class="form-control" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="requested_by">Requested by:</label>
                <select type="" name="requested_by" class="form-control" required>
                    <option value="" disabled selected>Select Requestor</option>
                     @if($users = App\Models\User::get())
                     @foreach($users as $user)
                      <option value="{{ $user->id }}"> {{ $user->name }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
            <div class="form-group">
                <label for="requested_printed_name">Printed Name:</label>
                <select type="" name="requested_by" class="form-control" required>
                    <option value="" disabled selected>Select Name</option>
                     @if($departments = App\Models\Department::get())
                        @foreach($departments as $department)
                              <option value="{{ $department->id }}"> {{ $department->name }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="requested_designation">Designation:</label>
                <select type="" name="requested_by" class="form-control" required>
                    <option value="" disabled selected>Select Designation</option>
                     @if($departments = App\Models\Department::get())
                     @foreach($departments as $department)
                          <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                        @endforeach
                      @endif
                </select>
            </div>
            <div class="form-group">
                <label for="approved_by">Approved by:</label>
                <select type="" name="approved_by" class="form-control" required>
                    <option value="" disabled selected>Select Approved by</option>
                     @if($departments = App\Models\Department::get())
                     @foreach($departments as $department)
                      <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                    @endforeach
                  @endif
                </select>
            </div>
            <div class="form-group">
                    <label for="approved_printed_name">Printed Name:</label>
                    <select type="" name="requested_by" class="form-control" required>
                        <option value="" disabled selected>Select Name</option>
                         @if($departments = App\Models\Department::get())
                         @foreach($departments as $department)
                          <option value="{{ $department->id }}"> {{ $department->name }}</option>
                        @endforeach
                      @endif
                  </select>
            </div>
            <div class="form-group"> <label for="approved_designation">Designation:</label>
                <select type="" name="requested_by" class="form-control" required>
                    <option value="" disabled selected>Select Designation</option>
                     @if($departments = App\Models\Department::get())
                     @foreach($departments as $department)
                      <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                    @endforeach
                  @endif
                </select>
            </div>
            <div class="form-group">
                <label for="issued_by">Issued by:</label>
                 <select type="" name="issued_by" class="form-control" required>
                    <option value="" disabled selected>Select Issued by</option>
                     @if($departments = App\Models\Department::get())
                     @foreach($departments as $department)
                      <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                    @endforeach
                  @endif
              </select>
              </div>
            <div class="form-group"> 
                 <label for="issued_printed_name">Printed Name:</label>
                     <select type="" name="requested_by" class="form-control" required>
                    <option value="" disabled selected>Select Name</option>
                     @if($departments = App\Models\Department::get())
                     @foreach($departments as $department)
                      <option value="{{ $department->id }}"> {{ $department->name }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
            <div class="form-group">
                <label for="issued_designation">Designation:</label>
                 <select type="" name="requested_by" class="form-control" required>
                    <option value="" disabled selected>Select Designation</option>
                     @if($departments = App\Models\Department::get())
                     @foreach($departments as $department)
                      <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                    @endforeach
                  @endif
              </select>
            </div>
            <div class="form-group">
                <label for="received_by">Received by:</label>
                <select type="" name="received_by" class="form-control" required>
                    <option value="" disabled selected>Select Received by</option>
                    @if($departments = App\Models\Department::get())
                         @foreach($departments as $department)
                          <option value="{{ $department->id }}"> {{ $department->department_user }}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="received_printed_name">Printed Name:</label>
                <select type="" name="requested_by" class="form-control" required>
                    <option value="" disabled selected>Select Name</option>
                    @if($departments = App\Models\Department::get())
                        @foreach($departments as $department)
                            <option value="{{ $department->id }}"> {{ $department->name }}</option>
                        @endforeach
                    @endif
                </select>
             </div>
            <div class="form-group">
                <label for="received_designation">Designation:</label>
                <select type="" name="requested_by" class="form-control" required>
                    <option value="" disabled selected>Select Designation</option>
                     @if($departments = App\Models\Department::get())
                     @foreach($departments as $department)
                      <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                        @endforeach
                  @endif
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status" class="form-control" required>
                    <option value="pending">Pending</option>
                    <option value="approved">Approved</option>
                    <option value="disapproved">Disapproved</option>
                </select>
            </div>
        </div>
    </div>
</div>  