@extends('OSA.userlist')

@section('content')


<main>
        
    <div class="container-user-list">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Member category
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
        <div class="table-responsive"> <!-- Add this div to make the table responsive -->
            <table class="table table-bordered table-center"> <!-- Added table-center class -->
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>John Doe</td>
                        <td>johndoe@example.com</td>
                        <td>User</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jane Smith</td>
                        <td>janesmith@example.com</td>
                        <td>Admin</td>
                    </tr>
                    <!-- Add more user rows here -->
                </tbody>
            </table>
        </div>
    </div>
   
   
</main>



@endsection