<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SOARS')); ?></title>

    <!-- Bootstrap CSS -->
    <link href="<?php echo e(url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    
    <!-- Fonts -->
    <link rel="icon" href="<?php echo e(url('/photos/OSA LOGO.png')); ?>">
    <link href="<?php echo e(asset('bootstrap-5.3.2-dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/admingeneral.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')); ?>" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="<?php echo e(url('https://code.jquery.com/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js')); ?>"></script>
    

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss']); ?>  
</head>
<body>
    <!--Sidebar portion-->
    <div class="container-fluid">
        <div class="row">
            <header>
                    <div class="container">
                        <a class="navbar-brand">
                        <?php if(Route::is('admin')): ?>
                            <h2 >Dashboard</h2>
                        <?php elseif(Route::is('studlist')): ?>
                            <h2 >Manage Students</h2>
                        <?php elseif(Route::is('auditlog')): ?>
                            <h2 style="margin-left: 150px;">Audit Log</h2>
                        <?php elseif(Route::is('admin_profile')): ?>
                            <h2 style="margin-left: 150px;">Admin Profile</h2>
                        <?php elseif(Route::is('osalist')): ?>
                            <h2 >OSA Employee List</h2>
                        <?php elseif(Route::is('rso_list')): ?>
                            <h2 >Student Organization List</h2>
                        <?php endif; ?>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
            </header>
            <nav id="sidebar" class="navbar bg-body-tertiary" >
                <div class="container-fluid" style="height: 100%;">
                <!--Toggler-->
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <div class="d-flex align-items-center">
                        <span class="navbar-toggler-icon"></span>
                        <img src="<?php echo e(url('/photos/OSA LOGO.png')); ?>" alt="Logo" style="width: 40px; height: 40px;">
                            <h3 style="margin-top:10px">SOARS</h3><br> 
                    </div>
                </button>
                 <!--Content-->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color:#064b96;">
                <div class="offcanvas-header d-flex justify-content-between align-items-center">
                    <div class="sidebar-brand">
                        <div class="d-flex align-items-center">
                        <img src="<?php echo e(url('/photos/OSA LOGO.png')); ?>" alt="Logo" style="width: 40px; height: 40px;">
                            <h1 style="color:white;">SOARS</h1> 
                        </div>
                        <div class="admin" style="padding-left: 70px; padding-bottom: 0px;">
                                <h4>Admin</h4>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="color:white;"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('admin_profile')); ?>">
                                <div class="d-flex align-items-center" style="margin-left: -10px; color:white;">
                                    <i class="fa-regular fa-circle-user fa-lg"></i>
                                    <span class="ml-2"><?php echo e(Auth::user()->name); ?></span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('admin')); ?>" >
                                <div class="d-flex align-items-center" style="margin-left: -10px; color:white;">
                                    <i class="fa-regular fa-clipboard fa-lg"></i>
                                    <span class="ml-2">Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('auditlog')); ?>">
                                <div class="d-flex align-items-center" style="margin-left: -10px; color:white;">
                                    <i class="fa-regular fa-paste fa-lg"></i>
                                    <span class="ml-2">Audit log</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('studlist')); ?>">
                                <div class="d-flex align-items-center" style="margin-left: -10px; color:white;">
                                    <i class="fa-regular fa-address-book fa-lg"></i>
                                    <span class="ml-2">Manage Students</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('osalist')); ?>">
                                <div class="d-flex align-items-center" style="margin-left: -10px; color:white;">
                                    <i class="fa-regular fa-address-book fa-lg"></i>
                                    <span class="ml-2">Manage OSA Employees</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/rso_list">
                                <div class="d-flex align-items-center" style="margin-left: -10px; color:white;">
                                    <i class="fa-solid fa-users fa-lg"></i>
                                    <span class="ml-2">Organization List</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(route('logout')); ?>" 
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" style="color:white;">
                                <div class="d-flex align-items-center" style="margin-left: -10px;">
                                    <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                                    <span class="ml-2"><?php echo e(__('Logout')); ?></span>
                                </div>
                            </a>
                            <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
                                <?php echo csrf_field(); ?>
                            </form>
                        </li>
                    </ul>
                </div>
                <!--End of Toggler-->
            </div>
        </div>
    </nav>
                <!--End of content-->
<main >           
<?php echo $__env->yieldContent('content'); ?>
</main>
            
<?php echo $__env->yieldPushContent('scripts'); ?>

</body>
</html><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/navbar/admin_nav.blade.php ENDPATH**/ ?>