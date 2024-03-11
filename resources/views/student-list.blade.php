@extends('navbar.admin_nav')

@section('content')

<main style="padding-top: 30px;">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://kit.fontawesome.com/14059d6bc2.js" crossorigin="anonymous"></script>
<div class="container mt-2">
    <div class="row">
        <div class="col-6 margin-tb">
            <div class="pull-left">
                <h2>STUDENT LIST</h2>
            </div>
            <div class="pull-right mb-2">
                <a href="javascript:void(0)" class="btn btn-success" onClick="add()">New Student <i class="fa-solid fa-user-plus"></i></a>
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
                <th>Organization 1</th>
                <th>Organization 2</th>
                <th>Organization 3</th>
                <th>Org 1 Membership Status</th>
                <th>Org 2 Membership Status</th>
                <th>Org 3 Membership Status</th>
                <th>Roles</th>
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
      <!--Form-->
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <!-- First column -->
            <div class="col-md-6">
            <form action="javascript:void(0)" id="studentForm" name="studentForm" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id" id="id">

                        <div class="form-group">
                            <label for="student_id" class="col-sm-4 control-label">Student ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="student_id" name="student_id" placeholder="Enter Student ID" required maxlength="9">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="last_name" class="col-sm-4 control-label">Last Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Enter Last Name" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="middle_initial" class="col-sm-4 control-label">Middle Initial</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="middle_initial" name="middle_initial" placeholder="Enter Middle Initial">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="first_name" class="col-sm-4 control-label">First Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name" required>
                            </div>
                        </div>

                <div class="form-group">
                    <label for="email" class="col-sm-4 control-label">Email</label>
                    <div class="col-sm-8">
                        <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="organization1" class="col-sm-4 control-label">Organization 1</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="organization1" name="organization1" placeholder="Enter Organization (required)" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="organization2" class="col-sm-4 control-label">Organization 2</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="organization2" name="organization2" placeholder="Enter Organization (optional)">
                    </div>
                </div>

                
                </div>

                <!--Second Column-->
                <div class="col-md-6">
                <div class="form-group">
                    <label for="organization3" class="col-sm-4 control-label">Organization 3</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="organization3" name="organization3" placeholder="Enter Organization (optional)">
                    </div>
                </div>

                <div class="form-group">
                    <label for="password" class="col-sm-4 control-label">Password</label>
                    <div class="col-sm-8">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="org1_member_status" class="col-sm control-label">Org 1 Membership Status</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="org1_member_status" name="org1_member_status" required>
                            <option value="" disabled selected>Choose Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="org2_member_status" class="col-sm control-label">Org 2 Membership Status</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="org1_member_status" name="org1_member_status">
                            <option value="" disabled selected>Choose Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="org3_member_status" class="col-sm control-label">Org 3 Membership Status</label>
                    <div class="col-sm-8">
                        <select class="form-select" id="org1_member_status" name="org1_member_status">
                            <option value="" disabled selected>Choose Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="user_roles" class="col-sm-4 control-label">Roles</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="user_roles" name="user_roles" placeholder="Enter Roles" required>
                    </div>
                </div>


                <div class="form-group">
                    <label for="phone_number" class="col-sm-4 control-label">Phone Number</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Enter Phone Number" maxlength="11">
                    </div>
                </div>

                <div class="col-sm-offset-2 col-sm-10"><br/>
                    <button type="submit" class="btn btn-primary" id="btn-save">Save changes</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
  </div>
</div>
</main>

<script type="text/javascript">
    $(document).ready(function (){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#student-list').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ url('student-list') }}",
            columns: [
                {data: 'student_id', name: 'student_id'},
                {data: 'last_name', name: 'last_name'},
                {data: 'middle_initial', name: 'middle_initial'},
                {data: 'first_name', name: 'first_name'},
                {data: 'email', name: 'email'},
                {data: 'organization1', name: 'organization1'},
                {data: 'organization2', name: 'organization2'},
                {data: 'organization3', name: 'organization3'},
                {data: 'org1_member_status', name: 'org1_member_status'},
                {data: 'org2_member_status', name: 'org2_member_status'},
                {data: 'org3_member_status', name: 'org3_member_status'},
                {data: 'user_roles', name: 'user_roles'},
                {data: 'phone_number', name: 'phone_number'},
                {data: 'action', name: 'action', orderable: false},
            ],
            order: [[0, 'desc']]
        });

    });

    //for updating students info
    function editF(id){
        $.ajax({
            type: "POST",
            url: "{{ url('edit') }}",
            data: {student_id: id},
            
            success: function(res){
                console.log(res);
                $('#student-Modal').html("Edit Information");
                $('#studentModal').modal('show');
                $('#student_id').val(res.student_id);
                $('#last_name').val(res.last_name);
                $('#middle_initial').val(res.middle_initial);
                $('#first_name').val(res.first_name);
                $('#email').val(res.email);
                $('#organization1').val(res.organization1);
                $('#organization2').val(res.organization2);
                $('#organization3').val(res.organization3);
                $('#org1_member_status').val(res.org1_member_status);
                $('#org2_member_status').val(res.org2_member_status);
                $('#org3_member_status').val(res.org3_member_status);
                $('#user_roles').val(res.user_roles);
                $('#phone_number').val(res.phone_number);

                if (res.password) {
                $('#password').val(res.password); // Assuming the password field has an ID 'password'
            }
            },
            error: function (xhr, status, error) {
            console.log(xhr.responseText);
            // Handle error or log the details for troubleshooting
        }
        });
    }
    //for deleting students
    function deleteF(id){
        if (confirm("Delete Student Record?") == true){
            var id = id;

            $.ajax({
                type: "POST",
                url: "{{ url('delete') }}",
                data: { student_id:id },
                
                success: function(res){
                    var oTable = $("#student-list").dataTable();
                    oTable.fnDraw(false);
                }
            });
        }
    }
    

    function add(){
        $('#studentForm').trigger("reset");
        $('#student-Modal').html("Add Student");
        $('#studentModal').modal('show');
        $('#id').val('');
    }



// For submitting the form for adding or updating
$('#studentForm').submit(function(event){
    event.preventDefault();
    var actionUrl = "{{ isset($student) ? url('update') : url('store') }}"; // Determine action based on the presence of $student

    $.ajax({
        type:'POST',
        url: actionUrl,
        data: new FormData(this),
        cache: false,
        contentType: false,
        processData: false,
        success: function(response) {
            console.log(response.message);
            $('#studentModal').modal('hide');
            $('#student-list').DataTable().ajax.reload(); // Reload the DataTable
        },
        error: function(xhr, status, error){ 
            console.log(xhr.responseText);
            // Handle error or log the details for troubleshooting
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