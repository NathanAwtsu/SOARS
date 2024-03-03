@extends('navbar.navbar_osa')

@section('content')



<main style="overflow-x: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{url('/chatify')}}" class="card" style="height: 130px; background-color: #e57373; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-regular fa-message"></i> Messages </h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{url('/osaemp/activities')}}" class="card" style="height: 130px; background-color: #81c784; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-chart-line"></i> Activities {{$totalEvent->count()}}</h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{url('/osaemp/organization_activation')}}" class="card" style="height: 130px; background-color: #64b5f6; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-sitemap"></i> Organization Activation {{$totalPendingOrg->count()}}</h2>
                    <p style="font-size: 20px; color: white;"></p>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{url('/osaemp/userlist')}}" class="card" style="height: 130px; background-color: #ffb74d; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-users fa-lg"></i> Members {{$totalMember->count()}}</h2>
                    
                </a>
            </div>
        </div>
    </div>

    <div class="container">
        <h2>Activities</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Activity Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activities as $activity)
                <tr>
                    <td>{{ $activity->activity_title }}</td>
                    <td>{{ $activity->activity_start_date }}</td>
                    <td>{{ $activity->activity_end_date }}</td>
                    <td>{{ $activity->activity_start_time }}</td>
                    <td>{{ $activity->activity_end_time }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="container" >
        <div class="jumbotron">
            <div class="row">
                
                    <div class="panel panel-default">
                    <h3>Calendar of Events</h3>
                            <div id='calendar' style="background: #d3d3d3; color: #151b54;">
                            
                        </div>
                        <div class="panel-body">
                            
                        </div>
                    </div>
                
            </div>
        </div>
	</div>

</main>
  
<script>
$(document).ready(function () {
    var calendar = $('#calendar').fullCalendar({
        editable: true,
        events: '/osaemp/fullcalendar/events', // URL to fetch events
        displayEventTime: false,
        selectable: true,
        selectHelper: true,
        select: function (activity_start_date, activity_end_date, allDay) {
            var activity_title = prompt('Event Title:');
            if (activity_title) {
                var activity_start_date = $.fullCalendar.formatDate(activity_start_date, "Y-MM-DD");
                var activity_end_date = $.fullCalendar.formatDate(activity_end_date, "Y-MM-DD");

                // Send an AJAX request to add the event
                $.ajax({
                    url: '/osaemp/fullcalendar/activity',
                    data: {
                        activity_title: activity_title,
                        activity_start_date: activity_start_date,
                        activity_end_date: activity_end_date,
                        type: 'add'
                    },
                    type: 'POST',
                    success: function (response) {
                        // Handle success response
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                    }
                });
            }
        },
        eventDrop: function (event, delta) {
            // Handle event drop
        },
        eventClick: function (event) {
            var deleteMsg = confirm("Do you really want to delete?");
            if (deleteMsg) {
                // Send an AJAX request to delete the event
                $.ajax({
                    url: '/osaemp/fullcalendar/activity',
                    data: {
                        id: event.id,
                        type: 'delete'
                    },
                    type: 'POST',
                    success: function (response) {
                        // Handle success response
                    },
                    error: function (xhr, status, error) {
                        // Handle error response
                    }
                });
            }
        }
    });
});
</script>




@extends('layouts.footer')
@endsection
