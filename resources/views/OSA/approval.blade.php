@extends('navbar.navbar_osa')
@section('content')



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
                    <th>Organizaiton</th>
                    <th>Name</th>
                    <th>Event Name</th>
                    <th>Event Date</th>
                    <th>Event Location</th>
                    <th>Time</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>AdU IT&IS</td>
                    <td>john Loyd</td>
                    <td>Out Reach Program</td>
                    <td>12/22/23</td>
                    <td>Sv Hall</td>
                    <td>8:00 AM</td>
                    
                    <td>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</button>

                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>

                      </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AdU IT&IS</td>
                    <td>john Loyd</td>
                    <td>Out Reach Program</td>
                    <td>12/22/23</td>
                    <td>Sv Hall</td>
                    <td>8:00 AM</td>
                    
                    <td>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</button>

                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>

                      </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AdU IT&IS</td>
                    <td>john Loyd</td>
                    <td>Out Reach Program</td>
                    <td>12/22/23</td>
                    <td>Sv Hall</td>
                    <td>8:00 AM</td>
                    
                    <td>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</button>

                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>

                      </td>
                </tr>
                <tr>
                    <td>1</td>
                    <td>AdU IT&IS</td>
                    <td>john Loyd</td>
                    <td>Out Reach Program</td>
                    <td>12/22/23</td>
                    <td>Sv Hall</td>
                    <td>8:00 AM</td>
                    
                    <td>
                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#approveModal">Approve</button>

                        <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#rejectModal">Reject</button>

                      </td>
                </tr>
                
                
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
                <form style="max-width: 400px; margin: auto;">
                    <!-- Event details input fields -->
                    <div class="form-group row mb-2">
                        <label for="eventName" class="col-sm-4 col-form-label text-left">Event Name:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="eventName" name="eventName" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="eventDate" class="col-sm-4 col-form-label text-left">Event Date:</label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" id="eventDate" name="eventDate" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="eventTime" class="col-sm-4 col-form-label text-left">Event Time:</label>
                        <div class="col-sm-8">
                            <input type="time" class="form-control" id="eventTime" name="eventTime" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="eventLocation" class="col-sm-4 col-form-label text-left">Event Location:</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" id="eventLocation" name="eventLocation" required>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="eventDescription" class="col-sm-4 col-form-label text-left">Event Description:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="eventDescription" name="eventDescription" rows="4" required></textarea><br>
                        </div>
                    </div>
                    <div class="form-group row mb-2">
                        <label for="eventLink" class="col-sm-4 col-form-label text-left">Event Link:</label>
                        <div class="col-sm-8">
                            <textarea class="form-control" id="eventLink" name="eventDescription" rows="4"></textarea><br>
                        </div>
                    </div>
                    <!-- ... (other event details input fields) ... -->
                    <button type="button" class="btn btn-primary btn-block" onclick="showEmailModal()">Next</button>
                    <button type="button" class="btn btn-danger btn-block" data-bs-dismiss="modal">Cancel</button>
                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="sendEmailModal" tabindex="-1" role="dialog" aria-labelledby="sendEmailModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Email To</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="">
            <div class="modal-body">
                <!-- Email recipients checkboxes -->
                <label><input type="checkbox" id="checkbox1"> RSO</label><br>
                <label><input type="checkbox" id="checkbox2"> Student Leaders</label><br>
                <label><input type="checkbox" id="checkbox3"> Members</label><br>
                <label><input type="checkbox" id="checkbox4"> Send to all</label><br>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" onclick="createEvent()">Create</button>
                <button type="button" class="btn btn-secondary" onclick="closePopup()">Cancel</button>
            </div>
            </form>
        </div>
    </div>
</div>



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


@extends('layouts.footer')
@endsection