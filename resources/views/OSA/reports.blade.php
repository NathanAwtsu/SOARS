@extends('navbar.navbar_osa')
@section('content')


<main>
    <div class="container-report-list">
    
        <div class="table-responsive"> <!-- Add this div to make the table responsive -->
            <div class="col-10" style="padding: 10px;"> <!-- Use the entire row -->
                <h2 class="text-left">PAST EVENTS</h2>
            </div>
            <table class="table table-bordered table-center"> <!-- Added table-center class -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($activity as $key => $event)
                        <tr>
                            <td>{{$event->id}}</td>
                            <td>{{$event->status}}</td>
                            <td>{{$event->organization_name}}</td>
                            <td>{{$event->activity_title}}</td>
                            <td>{{$event->type_of_activity}}</td>
                            <td>{{$event->activity_start_date}}</td>
                            <td>{{$event->activity_end_date}}</td>
                            <td>{{$event->activity_start_time}}</td>
                            <td>{{$event->activity_end_time}}</td>
                            <td>{{$event->venue}}</td>
                            <td>{{$event->participants}}</td>
                            <td>{{$event->partner_organization}}</td>
                            <td>{{$event->organization_fund}}</td>
                            <td>{{$event->solidarity_share}}</td>
                            <td>{{$event->registration_fee}}</td>
                            <td>{{$event->AUSG_subsidy}}</td>
                            <td>{{$event->sponsored_by}}</td>
                            <td>{{$event->ticket_selling}}</td>
                            <td>{{$event->ticket_control_number}}</td>
                            <td>{{$event->other_source_of_fund}}</td>
                            
                        </tr>
                        @endforeach
                    </tbody> 
                    </table>
        </div>
    </div>

   <div class="container-report-list" style="padding-top: 20px;">
    <div class="row">
        <div class="col-10"> <!-- Use the entire row -->
            <h2 class="text-left">PAYPAL TRANSACTIONS</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Organization</th>
                            <th>Event Name</th>
                            <th>Status</th>
                            <th>Collected</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Your table rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>


@extends('layouts.footer')
@endsection