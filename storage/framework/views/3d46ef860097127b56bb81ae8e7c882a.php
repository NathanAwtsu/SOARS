
<?php $__env->startSection('content'); ?>


<main >
        
    <div class="container" style="padding-top: 10px;">
        <div class="container-event text-center">
            <h2>Create an event</h2>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createEventModal">Create an Event</button>
        </div>
    </div>
    
    <div class="container-tbl-up">
            <table class="table"> <br>
           
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Requirement</th>
                    <th>Organization</th>
                    <th>Activity Title</th>
                    <th>Type of Activity</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Venue</th>
                    <th>Participants</th>
                    <th>Partner Org</th>
                    <th>Org Fund</th>
                    <th>Solidarity Share</th>
                    <th>Registration Fee</th>
                    <th>AUSG Subsidy</th>
                    <th>Sponsored By</th>
                    <th>Ticket Selling</th>
                    <th>Ticket Control No.</th>
                    <th>Other Source of Fund</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($event->id); ?></td>
                    <td><?php echo e($event->status); ?></td>
                    <td><?php echo e($event->requirement); ?></td>
                    <td><?php echo e($event->organization_name); ?></td>
                    <td><?php echo e($event->activity_title); ?></td>
                    <td><?php echo e($event->type_of_activity); ?></td>
                    <td><?php echo e($event->activity_start_date); ?></td>
                    <td><?php echo e($event->activity_end_date); ?></td>
                    <td><?php echo e($event->activity_start_time); ?></td>
                    <td><?php echo e($event->activity_end_time); ?></td>
                    <td><?php echo e($event->venue); ?></td>
                    <td><?php echo e($event->participants); ?></td>
                    <td><?php echo e($event->partner_organization); ?></td>
                    <td><?php echo e($event->organization_fund); ?></td>
                    <td><?php echo e($event->solidarity_share); ?></td>
                    <td><?php echo e($event->registration_fee); ?></td>
                    <td><?php echo e($event->AUSG_subsidy); ?></td>
                    <td><?php echo e($event->sponsored_by); ?></td>
                    <td><?php echo e($event->ticket_selling); ?></td>
                    <td><?php echo e($event->ticket_control_number); ?></td>
                    <td><?php echo e($event->other_source_of_fund); ?></td>
                    <td>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</button>

                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>

                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody> 
                
                
</main>

 <!-- "Approve" Confirmation Modal -->
 <div class="modal fade" id="approveModal" tabindex="-1" role="dialog" aria-labelledby="approveModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approveModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to approve this event?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                
            </div>
        </div>
    </div>
</div>

<!-- "Reject" Confirmation Modal -->
<div class="modal fade" id="rejectModal" tabindex="-1" role="dialog" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">Confirmation</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to reject this event?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                
            </div>
        </div>
    </div>
</div>

<!-- Create Event Modal -->


<!-- Create Event Modal -->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="createEventModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h2 class="modal-title" id="createEventModalLabel">Create an Event</h2>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form style="max-width: 400px; margin: auto;" method="post" action="/osaemp/activity_approval">
                <?php echo csrf_field(); ?>
                

                <!-- Event details input fields -->
                <div class="form-group row mb-2">
                    <label for="eventId" class="col-sm-4 col-form-label text-left">Event ID:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="id" name="id" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventName" class="col-sm-4 col-form-label text-left">Event Status:</label>
                    <div class="col-sm-8">
                        <div class="col-sm-8">
                            <select class="form-control" id="eventStatus" name="status" onchange="showHideOthers(this);" required>
                                <option value="Approved">Approved</option>
                                <option value="Standby">Standby</option>
                                <option value="Rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventOrgname" class="col-sm-4 col-form-label text-left">Organization Name:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="organization_name" name="organization_name" required>
                    </div>
                </div>
                
                <div class="form-group row mb-2">
                    <label for="eventOrgname" class="col-sm-4 col-form-label text-left">Activity Name: </label>
                    <div class="col-sm-8">
                        <input type="text" class="activity_title-control" id="activity_title" name="activity_title" required>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="eventName" class="col-sm-4 col-form-label text-left">Activity Type: </label>
                    <div class="col-sm-8">
                        <div class="col-sm-8">
                            <select class="form-control" id="type_of_activity" name="type_of_activity" onchange="showHideOthers(this);" required>
                                <option value="Organizational related">Organizational related</option>
                                <option value="Environmental">Environmental</option>
                                <option value="Organizational Development">Organizational Development</option>
                                <option value="Spiritual Enrichment">Spiritual Enrichment</option>
                                <option value="Community Involvement">Community Involvement</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Start of Event Date:</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="activity_start_date" name="activity_start_date" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">End of Event Date:</label>
                    <div class="col-sm-8">
                        <input type="date" class="form-control" id="activity_end_date" name="activity_end_date" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventTime" class="col-sm-4 col-form-label text-left">Start of Event Time:</label>
                    <div class="col-sm-8">
                        <input type="time" class="form-control" id="activity_end_time" name="activity_start_time" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventTime" class="col-sm-4 col-form-label text-left">End of Event Time:</label>
                    <div class="col-sm-8">
                        <input type="time" class="form-control" id="activity_end_time" name="activity_end_time" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventLocation" class="col-sm-4 col-form-label text-left">Event Location:</label>
                    <div class="col-sm-8">
                        <select class="form-control" id="venue" name="venue" onchange="showHideOthers(this);" required>
                            <option value="SV HAll">SV Hall</option>
                            <option value="ST Quad">ST Quad</option>
                            <option value="Adamson Theatre">Adamson Theatre</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Participants:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="participants" name="participants" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Partner Organization:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="partner_organization" name="partner_organization" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Organization fund:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="organization_fund" name="organization_fund" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Solidarity Share:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="solidarity_share" name="solidarity_share" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Registration Fee:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="registration_fee" name="registration_fee" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">AUSG Subsidy:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="AUSG_subsidy" name="AUSG_subsidy" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Sponsored By:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="sponsored_by" name="sponsored_by" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Ticket Selling:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ticket_selling" name="ticket_selling" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Ticket Control #:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="ticket_control_number" name="ticket_control_number" required>
                    </div>
                </div>

                <!-- ... (other event details input fields) ... -->
                <button type="Submit" class="btn btn-primary btn-block" onclick="showEmailModal()">Next</button>
                <button type="button" class="btn btn-danger btn-block" data-bs-dismiss="modal">Cancel</button>
            </form>
        </div>
    </div>
</div>
</div>
<!------

<div class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-labelledby="sendEmailModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Send Email To</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            
            <label><input type="checkbox" id="checkbox1"> RSO</label><br>
            <label><input type="checkbox" id="checkbox2"> Student Leaders</label><br>
            <label><input type="checkbox" id="checkbox3"> Members</label><br>
            <label><input type="checkbox" id="checkbox4"> Send to all</label><br>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" onclick="createEvent()">Create</button>
            <button type="button" class="btn btn-secondary" onclick="closePopup()">Cancel</button>
        </div>
    </div>
</div>
</div>


--->





<script>
function showEmailModal() {
    // Hide the create event modal
    $('#createEventModal').modal('hide');
    // Show the send email modal
    $('#sendEmailModal').modal('show');
}

function closePopup() {
    // Hide the send email modal
    $('#sendEmailModal').modal('hide');
}

function createEvent() {
    // Add your logic to handle the creation of the event and sending emails
    // You can access checkbox values using document.getElementById('checkbox1').checked
    // Close the popup after handling the event creation
    closePopup();
}
</script>

<script>
function showHideOthers(selectElement) {
    var otherLocationDiv = document.getElementById('othersLocation');
    var otherLocationInput = document.getElementById('otherEventLocation');

    if (selectElement.value === 'others') {
        otherLocationDiv.style.display = 'block';
        otherLocationInput.required = true;
    } else {
        otherLocationDiv.style.display = 'none';
        otherLocationInput.required = false;
    }
}
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/approval.blade.php ENDPATH**/ ?>