@extends('navbar.navbar_osa')

@section('content')

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
  
</script>


@endsection
@extends('layouts.footer')