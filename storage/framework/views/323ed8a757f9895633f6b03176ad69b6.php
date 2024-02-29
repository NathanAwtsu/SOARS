<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SOARS')); ?></title>

    <!-- Fonts -->
    <link rel="icon" type="image/png" href="<?php echo e(url('public/photos/OSA LOGO.png')); ?>">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="<?php echo e(url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')); ?>" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="<?php echo e(url('bootstrap-5.3.2-dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(url('css/OSAgeneral.css')); ?>">
    <script src="<?php echo e(url('https://code.jquery.com/jquery-3.6.0.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js')); ?>"></script>
    <script src="<?php echo e(url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js')); ?>"></script>

    <!--FullCalendar-->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.css" rel="stylesheet">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.0/fullcalendar.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        


    <?php if(Route::is('osaorganization_new')||Route::is('osaorganization_pending_edit_view')): ?>
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
<div class="container-fluid" >
    <div class="row">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
                <div class="container">
                    <a class="navbar-brand" >

                        <?php if(Route::is('osaemp')): ?>
                            <h2>Home</h2>

                        <?php elseif(Route::is('osaactivity')): ?>
                            <h2>Approved Activity</h2>

                        <?php elseif(Route::is('osaorgact')): ?>
                            <h2>Organization Activation</h2>

                        <?php elseif(Route::is('osadashboard')): ?>
                            <h2>Dashboard</h2>

                        <?php elseif(Route::is('osauser')): ?>
                            <h2><?php echo e(Auth::user()->name); ?></h2>

                        <?php elseif(Route::is('osauserlist')): ?>
                            <h2>User List</h2>

                        <?php elseif(Route::is('osareports')): ?>
                            <h2>Reports</h2>

                        <?php elseif(Route::is('osaorganizationlist')): ?>
                            <h2>Oganization List</h2>

                        <?php elseif(Route::is('osaorganization_new')): ?>
                            <h2>New Organization</h2>

                        <?php elseif(Route::is('osaactivityevent')): ?>
                            <h2>Event Manager</h2>
                            
                        <?php elseif(Route::is('osaactivityapproval')): ?>
                            <h2>Event manager</h2>
                        <?php endif; ?>


                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <?php if(Route::is('osauserlist') || Route::is('osaorganizationlist')): ?>
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
                    <?php endif; ?>
                </div>
            </nav>
        </header>

        <nav id="sidebar" class="navbar bg-body-tertiary fixed-top" style="padding: 8px 8px 8px 8px; background-color: #0762c5 !important; ">
            <div class="container" style="background-color: #0762c4;">
                
                <img src="/photos/OSA LOGO.png" alt="" style="max-width: 50px;">
                <h1 style="color:white;">SOARS OSA</h1>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
              <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header" style="background-color: #064b96;">
                    <img src="/photos/OSA LOGO.png" alt="" style="max-width: 50px; margin-right: 6px;">
                    <h1 style="color:white;">SOARS</h1><br> 
                  <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body" style="background-color: #0762c4">
                  <ul class="navbar-nav justify-content-start flex-grow-1 pe-3">
                    <ul class="nav flex-column">
                        
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
                            <a class="nav-link" href="<?php echo e(url('/osaemp/reports')); ?>" style="color:white;">
                                <i class="fa-solid fa-clipboard-list fa-lg"></i>
                                Reports
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/osaemp/activity_approval')); ?>" style="color:white;">
                                <i class="fa-solid fa-clipboard-list fa-lg"></i>
                                <span class="ml-2">Event Manager</span>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/osaemp/userlist')); ?>" style="color:white; ">
                                <i class="fa-regular fa-address-book fa-lg"></i>
                                <span class="ml-2">Manage Users</span>
                            </a>
                        </li>
            
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo e(url('/osaemp/organization_list')); ?>" style="color:white; margin-left:5px;">
                                <div class="d-flex align-items-center" style="margin-left: -10px;">
                                    <i class="fa-solid fa-users fa-lg"></i>
                                    <span class="ml-2">Manage Organizations</span>
                                </div>
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
                  </ul>
                  
                </div>
              </div>
            </div>
          </nav>

</div>
</div>



<?php echo $__env->yieldContent('content'); ?>
<?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/navbar/navbar_osa.blade.php ENDPATH**/ ?>