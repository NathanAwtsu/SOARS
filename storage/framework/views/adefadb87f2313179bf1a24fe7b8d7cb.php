<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOARS</title>
    <!-- Add the Bootstrap CSS CDN link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="app.css">
</head>
<body>
    
    <!-- Sidebar portion  -->
    <div class="container-fluid">
        <div class="row">
            
         <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        
                        <li class="nav-item">
                            <a class="nav-link active" href="home">
                                UserName
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="home">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="home">
                                Audit Log
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="home">
                                User Privillege
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('studlist')); ?>">
                                Students List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('courselist')); ?>">
                                Courses List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Organization List
                            </a>
                        </li>
                        <li class="nav-item">
                          
                            <a class="nav-link"  href="#">
                                Log Out
                            </a>
                        </li></i>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>-->
    <!-- <script>
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
    </script>-->

</body>
</html><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/layouts/sidebar.blade.php ENDPATH**/ ?>