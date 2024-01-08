<div class="modal fade" id="approvedModal" tabindex="-1" role="dialog" aria-labelledby="approvedModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approvedModal">Approved Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action=""id="approved" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                <input type="hidden" id="id" name="id" value="">
                <div class="received-by" style="display: none;">
                    <div class="col-md-12 form-group">
                        <label for="received_by">RECEIVED BY</label>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="received_printed_name">Printed Name:</label>
                        <input type="text" id="received_printed_name" class="form-control" name="received_printed_name" required>
                    </div>
                    <div class="col-md-12 form-group">
                        <label for="received_designation">Designation:</label>
                        <select type="" name="received_designation" class="form-control" required>
                            <option value="" disabled selected>Select Designation</option>
                            @if($departments = App\Models\Department::get())
                                @foreach($departments as $department)
                                    <option value="{{ $department->id }}"> {{ $department->designation }}</option>
                                @endforeach
                        @endif
                        </select>
                    </div>
                </div>
                    <p>Are you sure you want to approved this?</p>
                </div>
                <?php
                    date_default_timezone_set('UTC');

                    $currentDateTime = new DateTime();
                    $currentDateTime->setTimezone(new DateTimeZone('Asia/Manila'));
                    $currentDate = $currentDateTime->format('Y-m-d H:i:s');
                ?>
                <input type="hidden" name="current_date" value="{{ $currentDate }}">
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary btnApproved" data-dismiss="modal">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>