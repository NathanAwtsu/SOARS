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

    <div class="container">
			<h3>Calendar of Events</h3>
			<div id='calendar'></div>
		</div>

        
</main>
  
        <script>
        $(document).ready(function () {
			   
               var SITEURL = "{{ url('/') }}";
                 
               $.ajaxSetup({
                   headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
               });
                 
               var calendar = $('#calendar').fullCalendar({
                                   editable: true,
                                   events: SITEURL + "/osaemp/fullcalendar/activity",
                                   displayEventTime: false,
                                   editable: true,
                                   eventRender: function (event, element, view) {
                                       if (event.allDay === 'true') {
                                               event.allDay = true;
                                       } else {
                                               event.allDay = false;
                                       }
                                   },
                                   selectable: true,
                                   selectHelper: true,
                                   select: function (start, end, allDay) {
                                       var title = prompt('Event Title:');
                                       if (title) {
                                           var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                                           var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                                           $.ajax({
                                               url: SITEURL + "/osaemp/fullcalendar/activity",
                                               data: {
                                                   title: title,
                                                   start: start,
                                                   end: end,
                                                   type: 'add'
                                               },
                                               type: "POST",
                                               success: function (data) {
                                                   displayMessage("Event Created Successfully");
                 
                                                   calendar.fullCalendar('renderEvent',
                                                       {
                                                           id: data.id,
                                                           title: title,
                                                           start: start,
                                                           end: end,
                                                           allDay: allDay
                                                       },true);
                 
                                                   calendar.fullCalendar('unselect');
                                               }
                                           });
                                       }
                                   },
                                   eventDrop: function (event, delta) {
                                       var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                                       var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                 
                                       $.ajax({
                                           url: SITEURL + '/osaemp/fullcalendar/activity',
                                           data: {
                                               title: event.title,
                                               start: start,
                                               end: end,
                                               id: event.id,
                                               type: 'update'
                                           },
                                           type: "POST",
                                           success: function (response) {
                                               displayMessage("Event Updated Successfully");
                                           }
                                       });
                                   },
                                   eventClick: function (event) {
                                       var deleteMsg = confirm("Do you really want to delete?");
                                       if (deleteMsg) {
                                           $.ajax({
                                               type: "POST",
                                               url: SITEURL + '/osaemp/fullcalendar/activity',
                                               data: {
                                                       id: event.id,
                                                       type: 'delete'
                                               },
                                               success: function (response) {
                                                   calendar.fullCalendar('removeEvents', event.id);
                                                   displayMessage("Event Deleted Successfully");
                                               }
                                           });
                                       }
                                   }
                
                               });
                
               });
                
               function displayMessage(message) {
                   toastr.success(message, 'Event');
               }        
           </script>






@endsection
@extends('layouts.footer')