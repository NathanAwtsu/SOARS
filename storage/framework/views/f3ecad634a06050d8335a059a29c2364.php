<?php $__env->startSection('content'); ?>
<!--CARDS -->
<main style="padding-left: 250px; overflow-x: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="<?php echo e(url('/chatify')); ?>" class="card" style="height: 130px; background-color: #e57373; text-decoration: none;">
                    <h2 style="color: white;">
                        <i class="fa-regular fa-message"></i> 
                        Messages
                        <div class="pending-notification">
                        </div>                        
                    </h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="OSAreports.html" class="card" style="height: 130px; background-color: #81c784; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-chart-line"></i> Activities 
                    </h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="organization-activation.html" class="card" style="height: 130px; background-color: #64b5f6; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-sitemap"></i> Organization Activation</h2>
                    <p style="font-size: 20px; color: white;">100</p>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="<?php echo e(url('/osaemp/userlist')); ?>" class="card" style="height: 130px; background-color: #ffb74d; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-users fa-lg"></i> Members </h2>
                    
                </a>
            </div>
        </div>
    </div>


<div class="container">
    <h2>Activities</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Activity Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Start Time</th>
                <th>End Time</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($activity->activity_title); ?></td>
                <td><?php echo e($activity->activity_start_date); ?></td>
                <td><?php echo e($activity->activity_end_date); ?></td>
                <td><?php echo e($activity->activity_start_time); ?></td>
                <td><?php echo e($activity->activity_end_time); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>



</main>







<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/dashboard.blade.php ENDPATH**/ ?>