<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SOARS')); ?></title>

    <!-- Fonts -->
    <link href="<?php echo e(url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')); ?>" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?php echo e(asset('bootstrap-5.3.2-dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/OSAgeneral.css')); ?>">

    <?php if(Route::is('osaorganization_new')): ?>
    <style> form {
        text-align: left; /* Align text in the form to the left */
    }

    form label {
        display: block;
        margin-bottom: 8px;
    }

    form textarea,
    form input {
        width: 100%;
        box-sizing: border-box;
        margin-bottom: 16px;
    }</style>
        
    <?php endif; ?>
    
    <!-- Scripts -->
</head>
<body>

<!--Hamburger Menu-->
<div class="container-fluid">
    <div class="row">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
                <div class="container">
                    <a class="navbar-brand" >

                        <?php if(Route::is('osaemp')): ?>
                            <h2>Home</h2>
                        <?php elseif(Route::is('osadashboard')): ?>
                            <h2>Dashboard</h2>
                        <?php elseif(Route::is('osauser')): ?>
                            <h2><?php echo e(Auth::user()->name); ?></h2>
                        <?php elseif(Route::is('osauserlist')): ?>
                            <h2>User List</h2>
                        <?php elseif(Route::is('osaorganizationlist')): ?>
                            <h2>Oganization List</h2>
                        <?php elseif(Route::is('osaorganization_new')): ?>
                            <h2>New Organization</h2>
                        <?php endif; ?>

                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <form class="form-inline">
                                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                                    <button class="btn btn-primary" type="submit">Search</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar" >
    <div class="position-sticky">
        <ul class="nav flex-column" >
            <div class="sidebar-brand">
                <div class="d-flex align-items-center">
                    <img src="/photos/OSA LOGO.png" alt="" style="max-width: 50px; margin-right: 6px;">
                    <h1 style="color:white;">SOARS</h1><br> 
                </div>
                <div class="admin" style="padding-left: 70px; padding-bottom: 0px;">
                    <h4 style="color:white;">OSA</h4>
                </div>
            </div>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo e(url('/osaemp/user')); ?>" style="color:white;">
                    <i class="fa-regular fa-circle-user fa-lg"></i>
                    <?php echo e(Auth::user()->name); ?>

                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/osaemp/dashboard')); ?>" style="color:white;">
                    <i class="fa-regular fa-clipboard fa-lg"></i>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" style="color:white;">
                    <i class="fa-solid fa-clipboard-list fa-lg"></i>
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(url('/osaemp/organization_list')); ?>" style="color:white;">
                    <i class="fa-solid fa-clipboard-check fa-lg"></i>
                    Organizations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="OSAapproval.html" style="color:white;">
                    <i class="fa-solid fa-clipboard-list fa-lg"></i>
                    Approval Request
                </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" href="" style="color:white;">
                <i class="fa-solid fa-user"></i>
                    Student List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="OSAorglist.html" style="color:white;">
                    <i class="fa-solid fa-users fa-lg"></i>
                    Organization List
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo e(route('logout')); ?>" 
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" style="color:white;">
                    <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                    <?php echo e(__('Logout')); ?>

                </a>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none" style="color:white;">
                    <?php echo csrf_field(); ?>
                </form>
            </li>
        </ul>
    </div>
</nav>
</div>
</div>



<?php echo $__env->yieldContent('content'); ?>
<?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/navbar/navbar_osa.blade.php ENDPATH**/ ?>