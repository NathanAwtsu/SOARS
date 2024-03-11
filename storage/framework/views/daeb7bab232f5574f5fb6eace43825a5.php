<?php $__env->startSection('content'); ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-1">
        <div class="rowmain">
            <div class="col-md-6 offset-md-3">
                <form action="<?php echo e(route('user.update')); ?>" method="post">
                    <?php echo csrf_field(); ?>
                <h2>User Profile Setup</h2>
                <form>
                    <div class="form-group"><br>
                        
                            
                        
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your Password">
                    </div>
                    <div class="form-group"><br>
                        <label for="contactNumber">Contact Number</label>
                        <input type="tel" class="form-control" id="contactNumber" placeholder="Enter your New Contact Number">
                    </div>
                    <div class="form-group"><br>
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email address">
                        
                    </div>
                    <div class="text-right mt-3">
                        <div class="d-flex"><br><br>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button href="<?php echo e(route('user.index')); ?>" class="btn btn-default ml-2">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
   
</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/user.blade.php ENDPATH**/ ?>