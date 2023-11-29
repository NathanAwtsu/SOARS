<?php $__env->startSection('content'); ?>

    <!-- Your main content goes here -->
    
        <style>
            .card a {
                text-decoration: none; /* Remove underline */
                color: inherit; /* Inherit text color */
            }
        
            .card a:hover {
                text-decoration: none; /* Remove underline on hover */
                color: inherit; /* Inherit text color on hover */
            }
        </style>
        
        <div class="card-table">
                
            <a href=""><div class="card" style="height: 150px; background-color: #81c784;">
                <h2 style="color: white;">Activities <i class="fa-solid fa-chart-line"></i></h2>
                <p style="font-size: 30px; color: white;">69</p>
            </a>
            </div>
            <a href=""> <div class="card" style="height: 150px; background-color: #64b5f6;">
                <h2 style="color: white;">Member Approval <i class="fa-solid fa-users fa-lg"></i></h2>
                <p style="font-size: 30px; color: white;">69</p>
            </a> 
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