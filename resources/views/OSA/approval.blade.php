@extends('navbar.navbar_osa')
@section('content')


<main >
    <div class="container" style="padding-top: 10px;">
        <div class="container-event" style="margin-left:185px">
            <h2>Create an event</h2>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createEventModal">Create an Event</button>
        </div>
    </div>
    
    <div class="container-tbl-up">
            <table class="table"> <br>
           
            <thead>
                <tr>
                    <th>ID</th>
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
                
            </tbody>
            </table>
    </div>
       
</main>



@extends('layouts.footer')
@endsection