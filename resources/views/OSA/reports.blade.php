@extends('navbar.navbar_osa')
@section('content')


<main>
    <div class="container-report-list">
    
        <div class="table-responsive"> <!-- Add this div to make the table responsive -->
            <table class="table table-bordered table-center"> <!-- Added table-center class -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Organization</th>
                        <th>Event Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>MESAU</td>
                        <td>Mt pulag hike</td>
                        <td><div class="status approved">Approved</div></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>ADUgame</td>
                        <td>Online seminar</td>
                        <td><div class="status rejected">Rejected</div></td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>ADUgame</td>
                        <td>Online seminar</td>
                        <td><div> Pending</div></td>
                    </tr>
                    <!-- Add more user rows here -->
                </tbody>
            </table>
        </div>
    </div>

   <div class="container-report-list">
    <div class="row">
        <div class="col-10"> <!-- Use the entire row -->
            <h2 class="text-end">PAYPAL TRANSACTIONS</h2>
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