<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SOARS')); ?></title>

    <!-- Fonts -->
    <link rel="icon" href="<?php echo e(asset('/photos/OSA LOGO.png')); ?>">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlogin.css')); ?>">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->yieldPushContent('jquery'); ?>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss']); ?>
    
    <!-- Scripts -->
    
</head>
<body>

<main class="py-4">
    <center>
        <div class="container my-5">
            <div class="login-container">
                <div class="logo-and-heading">
                    <img src=<?php echo e(asset("photos/OSA LOGO.png")); ?> alt="" class="custom-image2">
                    <h1>SOARS</h1><br>
                </div>
                <h2>Office of Student Affairs</h2><br>
                
                    <button class="btn btn-danger" type="button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Session Expired</button>
                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none" style="color:white;">
        <?php echo csrf_field(); ?>
    </form>
                <img src="/photos/adulogo.png" alt="" class="custom-image">
            </div>
        </div>
    </center>
    </main>

</body>
</html><?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/session_expired.blade.php ENDPATH**/ ?>