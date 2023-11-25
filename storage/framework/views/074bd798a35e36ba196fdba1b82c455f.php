

<?php $__env->startSection('content'); ?>

<div class="container-tbl-up">
            
            
    <table class="table"> <br>
        
        <div class="btn-group">
            <a class="btn btn-create" type="button" id="createUserButton" style="margin-right: 20px;" href="<?php echo e(url('/osaemp/organization_list/new_organization')); ?>">Create New Organization</a>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Organization Category
                </button>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Academic</a></li>
                    <li><a class="dropdown-item" href="#">Co-Academic</a></li>
                    <li><a class="dropdown-item" href="#">Socio-Civic</a></li>
                </ul>
            </div>
        </div>
           
        <Center>
            <div class="card-table-title"> <H1>ACADEMIC</H1><br> </div>
            <div class="card-table">
    
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <img src="ACOMSS.jpg" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="ACOMSS.html" style="text-decoration: none; display: block;">
                                <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                    Adamson Computer Science Students Society (ACOMSS) 
                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </Center>
        
    </table>
    
     </div>
     

</div>



</div>

<script>
    // Show the modal when the button is clicked
    document.getElementById("createUserButton").addEventListener("click", function() {
        $('#createUserModal').modal('show');
    });
</script>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/organization_list.blade.php ENDPATH**/ ?>