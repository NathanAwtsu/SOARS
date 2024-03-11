<?php $__env->startSection('content'); ?>

    <!-- Your main content goes here -->
    
    
        <style>
            .card-table {
        display: flex;
        justify-content: space-between; /* Adjust as needed */
        }

        .card {
            flex: 1;
            margin: 0 5px; /* Adjust margin between cards */
        }

        .card a {
            text-decoration: none;
            color: inherit;
        }

        .card a:hover {
            text-decoration: none;
            color: inherit;
        }
        </style>
        
        <div class="card-table">
                
            
            <a href="<?php echo e(route('studlist')); ?>">
            <div class="card" style="height: 150px; background-color: #64b5f6;">
                <h2 style="color: white;">Total Students <i class="fa-solid fa-users fa-lg"></i></h2>
                    <p style="font-size: 30px; color: white;"><?php echo e($studentCount); ?></p>
            </a>
            </div>
            <a href="<?php echo e(route('osalist')); ?>">
            <div class="card" style="height: 150px; background-color: #64b5f6;">
                <h4 style="color: white;">OSA Employees <i class="fa-solid fa-users fa-lg"></i></h4>
                    <p style="font-size: 30px; color: white;"><?php echo e($osaEmpCount); ?></p>
            </a>
            </div>
            <a href="<?php echo e(route('rso_list')); ?>"><div class="card" style="height: 150px; background-color: #81c784;">
                <h2 style="color: white;">Total Recognized Student Organizations <i class="fa-solid fa-chart-line"></i></h2>
                <p style="font-size: 30px; color: white;"></p>
            </a>
            </div>
            
            
        </div>

        
        <div class="mt-4">
            <h3>Recently Created User Accounts</h3>
                <div class="list-group">
                <?php $__empty_1 = true; $__currentLoopData = $recentUsers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <a href="#" class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1"><?php echo e($user->name); ?></h5>
                                            <small><?php echo e($user->created_at->format('F j, Y')); ?></small>
                                        </div>
                                        <p class="mb-1"><?php echo e($user->email); ?></p>
                                        <small class="text-muted">User ID: <?php echo e($user->id); ?></small>
                                    </a>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <div class="alert alert-info" role="alert">
                                        No recently created users found.
                                    </div>
                                <?php endif; ?>
                </div>
        </div>

    
        
    
    <script>
        let lastScrollTop = 0;
        window.addEventListener("scroll", () => {
            let st = window.pageYOffset || document.documentElement.scrollTop;
            if (st > lastScrollTop) {
                // Scrolling down, hide the header
                document.querySelector(".scroll-header").classList.add("hidden");
            } else {
                // Scrolling up, show the header
                document.querySelector(".scroll-header").classList.remove("hidden");
            }
            lastScrollTop = st;
        });
    </script>
    

    <!-- Add Bootstrap JavaScript (optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('navbar.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/Admin/admin.blade.php ENDPATH**/ ?>