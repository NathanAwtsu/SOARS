<?php $__env->startSection('content'); ?>

<main style="padding-left: 250px; overflow-x: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="<?php echo e(url('/chatify')); ?>" class="card" style="height: 130px; background-color: #e57373; text-decoration: none;">
                    <h2 style="color: white;">
                        <i class="fa-regular fa-message"></i> 
                        Messages                        
                    </h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="OSAreports.html" class="card" style="height: 130px; background-color: #81c784; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-chart-line"></i> Activities 25</h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="organization-activation.html" class="card" style="height: 130px; background-color: #64b5f6; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-sitemap"></i> Organization Activation</h2>
                    <p style="font-size: 20px; color: white;">100</p>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="OSAuserlist.html" class="card" style="height: 130px; background-color: #ffb74d; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-users fa-lg"></i> Members 70</h2>
                    
                </a>
            </div>
        </div>
    </div>
</main>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/dashboard.blade.php ENDPATH**/ ?>