<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">  
  <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
  </head>
  <body>

    <div class="container">
    <br></br>

    
@if ($id)
    {{ Form::open(['url' => route('users.update', ['user' => $id]), 'method' => 'PUT']) }}
    <h2>Edit User</h2>
@else
    {{ Form::open(['url' => route('users.store')]) }}
    <h2>Add User</h2>
@endif
    <br></br>

    <div class="table-responsive text nowrap">
        <table class="table table-bordered">

            <tbody>
            <tr>
                <td>Student ID</td>
                <td>{{ Form::text('student_id', $id ? $user['student_id'] : null, ['class' =>  'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>First Name</td>
                <td>{{ Form::text('first_name', $id ? $user['first_name'] : null, ['class' =>  'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>Middle Initial</td>
                <td>{{ Form::text('middle_initial', $id && isset($user['middle_initial']) ? $user['middle_initial'] : null, ['class' => 'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>{{ Form::text('last_name', $id ? $user['last_name'] : null, ['class' =>  'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>Course ID</td>
                <td>{{ Form::text('course_id', $id && isset($user['course_id']) ? $user['course_id'] : null, ['class' =>  'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>Password</td>
                <td>{{ Form::text('password', $id && isset($user['password']) ? $user['password'] : null, ['class' =>  'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ Form::text('email', $id ? $user['email'] : null, ['class' =>  'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>Phone Number</td>
                <td>{{ Form::text('phone_number', $id ? $user['phone_number'] : null, ['class' => 'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>Roles</td>
                <td>{{ Form::text('roles', $id && isset($user['roles']) ? $user['roles'] : null, ['class' =>  'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>Organization</td>
                <td>{{ Form::text('student_org', $id && isset($user['student_org']) ? $user['student_org'] : null, ['class' =>  'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            <tr>
                <td>Membership Status</td>
                <td>{{ Form::text('member_status', $id && isset($user['member_status']) ? $user['member_status'] : null, ['class' =>  'form-control', 'autocomplete' => 'off']) }}</td>
            </tr>
            
        </tbody>
        </table>
        <button type="submit" class="btn btn-success btn-sm btn-rounded">Submit</button>
        <a href="{{route('users.index')}}" class="btn btn-danger btn-sm btn-rounded">Back</a>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>