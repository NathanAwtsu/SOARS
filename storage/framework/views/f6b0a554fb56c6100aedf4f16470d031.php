<a href="javascript:void(0)" data-toggle="tooltip" onClick="editF(<?php echo e($student_id); ?>)" data-original-title="Edit" class="edit btn btn-success edit"><i class="fa-solid fa-pen-to-square"></i></a>

<a href="javascript:void(0)" id="delete-student" onClick="deleteF(<?php echo e($student_id); ?>)" data-original-title="Delete" class="delete btn btn-danger delete"><i class="fa-solid fa-trash"></i></a>

<script>
    // Function to handle form submission
    function submitForm() {
        var actionUrl = "<?php echo e(isset($student) ? url('update') : url('store')); ?>";
        var formData = new FormData($('#studentForm')[0]);
        formData.append('org1_member_status', $('#org1_member_status').val()); // Add org1_member_status value
        formData.append('student_id', $('#student_id').val());
        formData.append('organization2', $('#organization2 option:selected').text());

        $.ajax({
            type: 'POST',
            url: actionUrl,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response.message);
                $('#studentModal').modal('hide'); // Close the modal upon success
                $('#student-list').DataTable().ajax.reload(); // Reload the DataTable
            },
            error: function(xhr, status, error) {
                console.log(xhr.responseText);
                // Handle error or log the details for troubleshooting
            }
        });
    }

    // Clear form fields when modal is hidden
    $('#studentModal').on('hide.bs.modal', function (e) {
        $('#studentForm').trigger('reset');
    });

    // Event listener for "Save changes" button
    $('#btn-save').on('click', function(event) {
        event.preventDefault();
        submitForm(); 
    });

    // Event listener for form submission on pressing Enter key
    $('#studentForm').on('keypress', function(event) {
        if (event.which === 13) { // Check if Enter key is pressed
            event.preventDefault();
            submitForm(); 
        }
    });
</script><?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/student-action.blade.php ENDPATH**/ ?>