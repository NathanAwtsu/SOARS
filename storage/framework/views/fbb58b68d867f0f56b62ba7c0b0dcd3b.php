<?php $__env->startSection('content'); ?>    

<main>
<?php if(empty($organizations) || count($organizations) === 0): ?>
        <!-- Handle case where no organizations exist -->
        <div class="empty-organizations">
            <p>No organizations found.</p>
        </div>
    <?php else: ?>
        <?php $__currentLoopData = $organizations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $organization): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if(!empty($organization['id']) && !empty($organization['name'])): ?>
                <div class="organization" id="<?php echo e($organization['id']); ?>" style="display: none;">
                    <!-- Content for <?php echo e($organization['name']); ?> page goes here -->
                    <h1><?php echo e($organization['name']); ?></h1>
                    <!-- Add any specific content for the organization -->
                    <img src="<?php echo e(asset('path_to_uploaded_image')); ?>" alt="Logo">
                    <!-- Implement upload functionality -->
                    <form action="<?php echo e(route('upload_logo')); ?>" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="file" name="logo">
                        <input type="hidden" class="organizationName" name="organizationName" value="<?php echo e($organization['name']); ?>">
                        <button type="submit">Upload Logo</button>
                    </form>
                </div>
                <?php else: ?>
                
                <div class="empty-organization">
                    <p>This organization is empty or lacks necessary information.</p>
                </div>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>


    <script>
        window.onload = function() {
            let content = "<?php echo e($content); ?>";
            showContent(content);
        }

        function showContent(contentId) {
            const organizations = document.querySelectorAll('.organization');
            organizations.forEach(org => {
                org.style.display = 'none';
            });

            document.getElementById(contentId).style.display = 'block';
        }

    </script>

</main>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/student_orgs/rso_detail.blade.php ENDPATH**/ ?>