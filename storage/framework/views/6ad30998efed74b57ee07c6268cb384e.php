<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    <!-- Include any additional meta tags, stylesheets, or scripts -->
    <link rel="icon" href="<?php echo e(asset('/photos/OSA LOGO.png')); ?>">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/adminlogin.css')); ?>">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <?php echo $__env->yieldPushContent('styles'); ?>
    <?php echo $__env->yieldPushContent('jquery'); ?>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/sass/app.scss']); ?>
</head>
<body>
    <header>
        <!-- Navbar or header content -->
        <nav>
            <ul>
                
                <!-- Add more navigation links as needed -->
            </ul>
        </nav>
    </header>

    <main>
        <?php echo $__env->yieldContent('content'); ?>
        <!-- This is where the content of child views will be injected -->
    </main>

    <footer>
        <!-- Footer content -->
        <p>&copy; <?php echo e(date('Y')); ?> <?php echo e(config('app.name', 'Laravel')); ?></p>
    </footer>

    <!-- Include any additional scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/layouts/app.blade.php ENDPATH**/ ?>