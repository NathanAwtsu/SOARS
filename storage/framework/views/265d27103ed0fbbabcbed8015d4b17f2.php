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
    <!--<link href="<?php echo e(asset('bootstrap-5.3.2-dist/css/bootstrap.min.css')); ?>" rel="stylesheet"> -->
    <link rel="stylesheet" href="<?php echo e(asset('css/OSAgeneral.css')); ?>">
    
    <!-- Scripts -->
    
</head>
<body>

    <div class="position-absolute top-50 start-50 translate-middle">
    <button class="btn btn-danger" type="button" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">Session Expired</button>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none" style="color:white;">
        <?php echo csrf_field(); ?>
    </form>

    </div>
<?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/session_expired.blade.php ENDPATH**/ ?>