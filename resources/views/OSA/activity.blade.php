@extends('navbar.navbar_osa')
@section('content')



<main>
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
            @foreach ($approved as $approve)
                
            
            <tr>
                <td><a>{{$approve->activity_title}}</a></td>
                <!-- Other table cells here -->
                <td><a>{{$approve->organization_name}}</a></td>
                <td>{{$approve->activity_start_date}} @ {{$approve->activity_start_time}}</td>
                <td>{{$approve->activity_end_date}} @ {{$approve->activity_end_date}}</td>
                <td>{{$approve->venue}}</td>
                <td>
                    <a href="{{url('')}}">Edit</a>
                </td>
            </tr>
            @endforeach
            </table><br>
        </center>
        </main>
    



<!-- Add Bootstrap JavaScript and jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>




@extends('layouts.footer')
@endsection