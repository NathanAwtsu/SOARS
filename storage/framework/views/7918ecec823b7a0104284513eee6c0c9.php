<?php $__env->startSection('content'); ?>


<main style="margin-top:20px;">
        
    <div class="container-user-list">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
              Member category
            </button>
            <ul class="dropdown-menu">
              
                <li><a class="dropdown-item" href="#">Organization</a></li>
              
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
                    <?php $__currentLoopData = $info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inf): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                    
                    <tr>
                        <td><?php echo e($inf->id); ?></td>
                        <td><?php echo e($inf->name); ?></td>
                        <td><?php echo e($inf->email); ?></td>
                        <td><?php echo e($inf->role); ?></td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <!-- Add more user rows here -->
                </tbody>
            </table>
        </div>
    </div>
   
   
</main>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/OSA/userlist.blade.php ENDPATH**/ ?>