@extends('navbar.navbar_student_leader')

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
</main>
  

@endsection
@extends('layouts.footer')