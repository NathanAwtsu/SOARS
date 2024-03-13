@extends('navbar.navbar_student')
@section('content')

</head>
<body>
<main style="overflow-x: hidden;">

    <div class="container" style="padding-top: 8%;">
        <h1>Calendar of Events</h1>
        <div id='calendar' style="background-color: rgb(255, 255, 255); padding: 10px 10px 20px 10px; margin-bottom: 30px;">
        </div>
    </div>
    @foreach ( $announcement1 as $announce )
      
    
    <div class="container">
            <h1 style="padding-left:20px; padding-top: 5%; padding-bottom: 2.5%;">
                <i class="fas fa-bullhorn"></i> Announcements
            </h1>
            <div class="announcement" style="margin-bottom:5%;">
                
                    <div class="announcement-header">
                        <h3 class="announcement-title">
                            <i class="fa-regular fa-clipboard"></i> Title: {{$announce->title}}
                        </h3>
                        <p class="announcement-date">Posted on {{$announce->created_at}}</p>
                        <p class="author">Author: {{$announce->author}}. {{$announce->author_org}}</p>
                    </div>
                    <div class="announcement-body">
                        <p class="announcement-content">
                        {{$announce->message}}
                        </p>
                    </div>
                
            </div>
    </div>
    @endforeach
</main>



<!--Calendar of Events-->
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
          url: '/student/dash', // Specify the URL to fetch events data from
          method: 'GET'
        }
        
      });
      calendar.render();
    });
  </script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>
 
 
 
 </body>
 </html>
 
@endsection
