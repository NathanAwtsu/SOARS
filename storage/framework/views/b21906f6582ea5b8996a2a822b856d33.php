<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'SOARS')); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="<?php echo e(asset('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('resources/css/OSAgeneral.css')); ?>">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->yieldPushContent('jquery'); ?>

    <!-- Scripts -->
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss', 'resources/js/app.js']); ?>
</head>
<?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/layouts/headers.blade.php ENDPATH**/ ?>