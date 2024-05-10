@extends('navbar.admin_nav')

@section('content')
<main>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <div class="container" style="margin-top: 90px;">
        <h1>List of Officers</h1>
        
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addNewModal">Add New</button>

        <!-- Officers Table -->
        <table class="table">
            <thead>
                <tr>
                    <th>Student ID</th>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($officers as $officer)
                <tr>
                    <td>{{$officer->student_id}}</td>
                    <td>{{$officer->first_name}} {{$officer->last_name}}</td>
                    <td>{{$officer->org1_member_status}}</td>
                    <td>
                        
                        <button type="button" class="btn btn-success btn-sm" id="promoteBtn">Promote</button>
                        <button type="button" class="btn btn-warning btn-sm" id="demoteBtn">Demote</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Add New Officer Modal -->
    <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="addNewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewModalLabel">Add New Officer</h5>
            </div>
            <div class="modal-body">
                <!-- Members Table -->
                <table id="membersTable" class="table">
                    <thead>
                        <tr>
                            <th>Student ID</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="promoteButton">Promote</button>
            </div>
        </div>
    </div>
</div>

<!-- Confirm Promotion Modal -->
<div class="modal fade" id="confirmPromotionModal" tabindex="-1" role="dialog" aria-labelledby="confirmPromotionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmPromotionModalLabel">Confirm Promotion</h5>
            </div>
            <div class="modal-body">
                Are you sure you want to promote this student?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmButton">Confirm</button>
            </div>
        </div>
    </div>
</div>
</main>

<script>
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        
        $('#membersTable').DataTable();

        function fetchOrganizationMembers() {
        $.ajax({
            url: '/organization/getMembers', 
            method: 'GET',
            data: { student_id: id }, 
            success: function(response) {
                
                $('#membersTable').DataTable().clear().draw();
                
                response.forEach(function(member) {
                    $('#membersTable').DataTable().row.add([
                        member.student_id,
                        member.first_name + ' ' + member.last_name,
                        
                    ]).draw(false);
                });
            },
            error: function(xhr, status, error) {
                console.error(error);
                
            }
        });
    }

    $('#addNewModal').on('shown.bs.modal', function() {
        fetchOrganizationMembers();
    });

        function liveSearch(query) {
            $.ajax({
                url: '/search/student',
                method: 'GET',
                data: { query: query },
                success: function(response) {
                    $('#searchResults').html('');

                    // Check if there are matching students
                    if (response.length > 0) {
                        response.forEach(function(student) {
                            $('#searchResults').append('<li class="list-group-item" data-student_id="' + student.student_id + '">' + student.student_id + ' - ' + student.first_name + ' ' + student.last_name + '</li>');
                        });
                    } else {
                        $('#searchResults').html('<p>No matching students found.</p>');
                    }
                }
            });
        }

        $('#searchInput').on('input', function() {
            var query = $(this).val();
            if (query.length > 2) {
                liveSearch(query);
            } else {
                $('#searchResults').html('');
            }
        });

        $('#promoteButton').click(function() {
            $('#confirmPromotionModal').modal('show');
        });

        $('#confirmButton').click(function() {
            // Get selected student ID
            var studentId = $('#searchResults .list-group-item.active').data('student_id');
            if (studentId) {
                $.ajax({
                    url: '/promote/student',
                    method: 'POST',
                    data: { studentId: studentId },
                    success: function(response) {
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });

        $('#searchResults').on('click', '.list-group-item', function() {
            $('#searchResults .list-group-item').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>


@endsection
