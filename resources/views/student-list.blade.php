@extends('layouts.app')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>STUDENT LIST</h2>
            </div>
            <div class="pull-right mb-2">
                <a href="javascript:void(0)" class="btn btn-success" onClick="add()">Add Student</a>
            </div>
        </div>
    </div>
@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{$message}}</p>
    </div>
@endif
<div class="card-body">
    <table class="table table-bordered" id="student-list">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Last Name</th>
                <th>Middle Initial</th>
                <th>First Name</th>
                <th>Email</th>
                <th>Course ID</th>
                <th>Membership Status</th>
                <th>Roles</th>
                <th>Username</th>
                <th>Phone Number</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
</div>
</div>
<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="studentModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title fs-5" id="studentModalLabel">Student Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="javascript:void(0)" id="studentForm" name="studentForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="id" id="id">

    <div class="form-group">
        <label for="student_id" class="col-sm-2 control-label">Student ID</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" required maxlength="9">
        </div>
    </div>

    <div class="form-group">
        <label for="last_name" class="col-sm-2 control-label">Last Name</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
        </div>
    </div>

    <div class="form-group">
        <label for="middle_initial" class="col-sm-2 control-label">Middle Initial</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="middle_initial" name="middle_initial" placeholder="Enter Middle Initial">
        </div>
    </div>

    <div class="form-group">
        <label for="first_name" class="col-sm-2 control-label">First Name</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
        </div>
    </div>

    <div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email</label>
        <div class="col-sm-12">
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
        </div>
    </div>

    <div class="form-group">
        <label for="course_id" class="col-sm-2 control-label">Course ID</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="course_id" name="course_id" placeholder="Enter Course ID" required>
        </div>
    </div>

    <div class="form-group">
        <label for="password" class="col-sm-2 control-label">Password</label>
        <div class="col-sm-12">
            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
        </div>
    </div>


    <div class="form-group">
        <label for="member_status" class="col-sm-2 control-label">Membership Status</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="member_status" name="member_status" placeholder="Enter Membership Status" required>
        </div>
    </div>

    <div class="form-group">
        <label for="roles" class="col-sm-2 control-label">Roles</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="roles" name="roles" placeholder="Enter Roles" required>
        </div>
    </div>

    <div class="form-group">
        <label for="username" class="col-sm-2 control-label">Username</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="username" name="username" placeholder="Enter Username" required>
        </div>
    </div>

    <div class="form-group">
        <label for="phone_number" class="col-sm-2 control-label">Phone Number</label>
        <div class="col-sm-12">
            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number">
        </div>
    </div>

    <div class="col-sm-offset-2 col-sm-10"><br/>
    <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
    </div>
</form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#student-crud').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('student-list') }}",
            columns: [
                {data: 'student_id', name: 'student_id'},
                {data: 'last_name', name: 'last_name'},
                {data: 'middle_initial', name: 'middle_initial'},
                {data: 'first_name', name: 'first_name'},
                {data: 'email', name: 'email'},
                {data: 'course_id', name: 'course_id'},
                {data: 'member_status', name: 'member_status'},
                {data: 'roles', name: 'roles'},
                {data: 'username', name: 'username'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });

    });
    

    function add(){
        $('#studentForm').trigger("reset");
        $('#student-Modal').html("Add Employee");
        $('#studentModal').modal('show');
        $('#id').val('');
    }

$('#studentForm').submit(function(s){
    s.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type:'POST',
        url: "{{ url('store') }}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            console.log(data);
            $('#studentModal').modal('hide');
            $('#btn-save').html('Submit');
            $('#btn-save').attr("disabled", false);
        },
        error: function(data){
            console.log(data);
        }
    });
});
</script>

@endsection


@push('styles')
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

@endpush
@push('jquery')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
@endpush



@push('scripts')
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
@endpush