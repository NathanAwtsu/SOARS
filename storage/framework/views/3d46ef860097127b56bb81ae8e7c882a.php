

<?php $__env->startSection('content'); ?>

<main>
    <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
    <div class="container" >
        <div class="container-event" style="padding: 10px;">
            <h1 style="text-align: start;">Create an event</h1>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createEventModal" >Create an Event</button>
        </div>
    </div>

    <div class="container" style="margin-top: 20px;">
        <h1 style="text-align: start;">Calendar of Events</h1>
        <div id='calendar' style="background-color: rgb(255, 255, 255); padding: 10px 10px 20px 10px; margin-bottom: 100px; margin-bottom:100px;"></div>
    </div>

    <center>
        <h1>Activity List</h1>
    
        <table >
            <tr>
                <th>Event Name</th>
                <th>Organization</th>
                <th>Event Start Date & time</th>
                <th>Event End Date & Time</th>
                <th>Venue</th>
                <th>Button</th>
            </tr>
            <?php $__currentLoopData = $approved; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                
            
            <tr>
                <td><a><?php echo e($approve->activity_title); ?></a></td>
                <!-- Other table cells here -->
                <td><a><?php echo e($approve->organization_name); ?></a></td>
                <td><?php echo e($approve->activity_start_date); ?> @ <?php echo e($approve->activity_start_time); ?></td>
                <td><?php echo e($approve->activity_end_date); ?> @ <?php echo e($approve->activity_end_date); ?></td>
                <td><?php echo e($approve->venue); ?></td>
                <td>
                    <a href="<?php echo e(url('')); ?>">Edit</a>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>
            <br>
    </center>

    <div class="container">
        <h1 style="text-align: start;">Pending Events</h1>
    </div>
    <center>
    <div class="table-responsive" style="margin: 0px 110px 0px 110px;">
    <div class="container-tbl-up" style="padding: 0px 0px !important; " >
        <form method="post" action="/osaemp/activity_approval/event_approve_or_edit" >
            <?php echo csrf_field(); ?>
            
            <table class="table table-bordered table-center" style="padding:0px 50px 0px 50px;"> <br>
           </thead>
            <thead>
                
                <tr>
                    <th>ID</th>
                    <th>Status</th>
                    <th>Org</th>
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
                    <th>Ticket No.</th>
                    <th>Other Source</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($event->id); ?></td>
                    <td><?php echo e($event->status); ?></td>
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
                        <button type="submit" name="approve" value="approve_<?php echo e($event->id); ?>" class="btn btn-success" style="padding-bottom:10px;">Approve</button>
                        <button type="submit" name="edit" value="edit_<?php echo e($event->id); ?>" class= "btn btn-warning"style="padding-bottom:10px;">Edit</button>
                        <button type="submit" name="action" value="reject_<?php echo e($event->id); ?>" class="btn btn-danger" style="padding-bottom:10px;">Reject</button>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody> 
            </table>
        </form>
    </div>
    </div>
    </center>
                
                
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
                <form action="" method="post">
                <button type="button" class="btn btn-primary">Confirm</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                </form>
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
                    <label for="id" class="col-sm-4 col-form-label text-left">ID:</label>
                    <div class="col-sm-8">
                        <input type="number" id="id" class="id" name="id" required>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label for="eventName" class="col-sm-4 col-form-label text-left">Event Status:</label>
                    <div class="col-sm-8">
                        <div class="col-sm-8">
                            <select class="form-control" id="eventStatus" name="status"  required>
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
                            <option value="SV Hall">SV Hall</option>
                            <option value="ST Quad">ST Quad</option>
                            <option value="Adamson Theatre">Adamson Theatre</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Participants:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="participants" name="participants" >
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Partner Organization:</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="partner_organization" name="partner_organization" >
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Organization fund:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="organization_fund" name="organization_fund">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Solidarity Share:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="solidarity_share" name="solidarity_share">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Registration Fee:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="registration_fee" name="registration_fee">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">AUSG Subsidy:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="AUSG_subsidy" name="AUSG_subsidy">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Sponsored By:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="sponsored_by" name="sponsored_by" >
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Ticket Selling:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ticket_selling" name="ticket_selling" >
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Ticket Control #:</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="ticket_control_number" name="ticket_control_number" >
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="eventDate" class="col-sm-4 col-form-label text-left">Other Source</label>
                    <div class="col-sm-8">
                        <input type="number" class="form-control" id="other_source_of_fund" name="other_source_of_fund">
                    </div>
                </div>

                <!-- ... (other event details input fields) ... -->
                <button type="Submit" class="btn btn-primary btn-block" >Next</button>
                <button type="" class="btn btn-danger btn-block" data-bs-dismiss="modal">Cancel</button>
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

  
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'dayGridMonth,timeGridWeek,timeGridDay',
          center: 'title',
          right: 'prev,next today',
        },
        events: {
          url: '/osaemp/dash', // Specify the URL to fetch events data from
          method: 'GET'
        }
        
      });
      calendar.render();
    });
  </script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
  






<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/approval.blade.php ENDPATH**/ ?>