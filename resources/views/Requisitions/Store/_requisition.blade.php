<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title"style="color: #8a2be2; font-weight: bold;">Requisition Slip</h3>
    </div>
    <div class="card-body">
        @csrf
        <div class="container row" style="margin: 0;">
            <div class="col-md-12 row">
                <div class="col-md-4 form-group">
                    <label for="entity_name">Entity Name:</label>
                    @if(isset($requisition))
                        <input type="text" name="entity_name" value="{{ $requisition->entity_name }}" class="form-control" required>
                    @else
                        <input type="text" name="entity_name" class="form-control" required>
                    @endif
                </div>
                <div class="col-md-4 form-group">
                    <label for="fund_cluster">Fund Cluster:</label>
                    <input type="text" name="fund_cluster" class="form-control">
                </div>
                <div class="col-md-4 form-group">
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
                <div class="col-md-4 form-group">
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
                <div class="col-md-4 form-group">
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
                <div class="col-md-4 form-group">
                    <label for="purpose">Purpose:</label>
                    <textarea name="purpose" class="form-control" rows="4" required></textarea>
                </div>
            </div>
            <div class="col-md-12 row">
                <div class="col-md-12 form-group">
                    <label for="requested_by">REQUESTED BY</label>  
                </div>
                <div class="col-md-4 form-group">
                    <label for="requested_printed_name">Printed Name:</label>
                    <input type="hidden" id="requested_by" name="requested_printed_name">
                    <select id="requested_name" name="requested_by" class="form-control requested_by" required>
                        <option value="" disabled selected>Select Name</option>
                        @if($users = App\Models\User::where('role',2)->get())
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" data-des="{{ $user->department_id}}"> {{ $user->name }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
                <div class=" col-md-4 form-group">
                    <label for="requested_designation">Designation:</label>
                    <input class="form-control" type="text" id="requested_designation" readonly  value="" required>
                    <input type="hidden" id="requested_designation_id" name="requested_designation" value="">
                </div>
                <div class="col-md-12 form-group">
                    <label for="received_by">RECEIVED BY</label>
                </div>
                <div class="col-md-4 form-group">
                    <label for="received_printed_name">Printed Name:</label>
                    <input type="text" id="received_by" class="form-control" name="received_printed_name">
                    <input type="hidden" name="received_by" value="0">
                </div>
                <div class="col-md-4 form-group">
                    <label for="received_designation">Designation:</label>
                    <input type="text" class="form-control" name="received_designation" value="">
                </div>
                <input type="hidden" name="status" value="pending">
            </div>
        </div>
    </div>
</div>