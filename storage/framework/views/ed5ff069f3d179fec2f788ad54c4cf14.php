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
</head>
<body>
<div class="contents">
    <main class="py-4">
        <?php echo $__env->yieldContent('content'); ?>
    </main>
</div>
<?php echo $__env->yieldPushContent('scripts'); ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/layouts/login.blade.php ENDPATH**/ ?>