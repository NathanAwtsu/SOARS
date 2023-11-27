<?php $__env->startSection('content'); ?>

    <!-- Your main content goes here -->
    <main >
        
        <div class="card-table">

            
            <div class="card">
                
               <a href=""><h2>Messages</h2></a>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                
                <a href=""><h2>Activities</h2></a>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                
                <a href=""><h2>Member Approval</h2></a>
                <p>Card description goes here.</p>
            </div>
           
        </div>
        
        <table class="table-home">
            <thead>
                <tr>
                    <th>Attendance Monitoring</th>
                
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <!-- Grid inside a table cell -->
                        <div class="attendance-grid">
                            <!-- Member 1 -->
                            <div class="attendance-item">
                                <div class="member-name">Member 1</div>
                                <div class="status present">Present</div>
                            </div>
                    
                            <!-- Member 2 -->
                            <div class="attendance-item">
                                <div class="member-name">Member 2</div>
                                <div class="status absent">Absent</div>
                            </div>
                    
                            <!-- Member 3 -->
                            <div class="attendance-item">
                                <div class="member-name">Member 3</div>
                                <div class="status present">Present</div>
                            </div>
                    
                            <!-- Member 4 -->
                            <div class="attendance-item">
                                <div class="member-name">Member 4</div>
                                <div class="status absent">Absent</div>
                            </div>
                    
                            <!-- Member 5 -->
                            <div class="attendance-item">
                                <div class="member-name">Member 5</div>
                                <div class="status present">Present</div>
                            </div>
                    
                            <!-- Member 6 -->
                            <div class="attendance-item">
                                <div class="member-name">Member 6</div>
                                <div class="status absent">Absent</div>
                            </div>
                        </div>
                    </td>
                    
                </tr>
            </tbody>
        </table>
    </main>

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

<?php echo $__env->make('navbar.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/Admin/admin.blade.php ENDPATH**/ ?>