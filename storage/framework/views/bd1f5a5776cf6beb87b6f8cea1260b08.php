<?php $__env->startSection('content'); ?>

<center>
    <div class="container my-5">
        <div class="login-container">
            <form method="POST" action="<?php echo e(route('login')); ?>">
                <?php echo csrf_field(); ?>
            <div class="logo-and-heading">
                <img src="photos/OSA LOGO.png" alt="" class="custom-image2">
                <h1>SOARS</h1><br>
            </div>
            <h2>Office of Student Affairs</h2>
            <form>
                <div class="form-group">
                    <label for="username">Email:</label>
                    <input id="email" type="email" class="form-control <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                    name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email" autofocus placeholder="Enter your Email">
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="invalid-feedback" role="alert">
                        <strong><?php echo e($message); ?></strong>
                    </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                    is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" name="password" required autocomplete="current-password" placeholder="Enter your password">
                   
                    

                    <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="invalid-feedback" role="alert">
                            <strong><?php echo e($message); ?></strong>
                        </span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    
                </div>
                <div class="form-group">
                    <input type="checkbox" name="remember" id="remember" style="width:10%;" <?php echo e(old('remember') ? 'checked' : ''); ?>>
                    <label for="remember" for="remember" style="display: inline;"><?php echo e(__('Remember Me')); ?></label>
                </div>
                <div class="form-group">
                    <?php if(isset($_GET['timeout'])): ?>
                        <h3 style="text-align: center; color: orangered">You've been automatically Logged out.</h3>
                    <?php endif; ?>
                </div>

    
                <div>
                
                
                
                <button type="submit" id="loginButton"><?php echo e(__('Login')); ?></button>
            </form>
            <img src="/photos/adulogo.png" alt="" class="custom-image">
        </div>
    </div>
</center>

<!--<script>
    document.getElementById('loginButton').addEventListener('click', function (event) {
        event.preventDefault(); 

        
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        if (email.trim() === '' || password.trim() === '') {
            alert('Please enter both email and password.'); 
            return;
        }

        
        redirectToTermsAndAgreement();
    });

    function redirectToTermsAndAgreement() {
        window.location.href = "<?php echo e(route('terms_and_agreement')); ?>"; 
    }
</script>-->

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/soars.blade.php ENDPATH**/ ?>