<?php $__env->startSection('content'); ?>

<div class="container-tbl-up">
            
            
    <table class="table"> <br>
        
        <div class="btn-group">
            <a class="btn btn-create" type="button" id="createUserButton" style="margin-right: 20px;" href="<?php echo e(url('/osaemp/organization_list/new_organization')); ?>">Create New Organization</a>
            
        </div>
           
        <Center>
            <?php if($pendings != null): ?>
                <div class="card-table-title">
                    <h1>PENDING</h1><br>
                </div>
                <div class="card-table">
                    <?php $__currentLoopData = $pendings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($pend != Null): ?>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <?php if($pend->requirement_status != "100"): ?>
                                        <progress id="file" value="<?php echo e($pend->requirement_status); ?>" max="100"></progress>
                                    <?php endif; ?>
                                    <img src="<?php echo e(asset('storage/app/public/'.$pend->logo)); ?>" alt="Image">
                                    <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                        <a href="<?php echo e(url('')); ?>" style="text-decoration: none; display: block;">
                                            <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                                <?php echo e($pend->name); ?>

                                            </h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <div class="card-table-title"> <H1>ACADEMIC</H1><br> </div>
                <div class="card-table">
                    <?php $__currentLoopData = $organizationAcademic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orgAcads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 col-md-4 col-sm-6">
                        <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <?php if($orgAcads->requirement_status != "100"): ?>
                            <progress id="file" value="<?php echo e($orgAcads->requirement_status); ?>" max="100"></progress>
                            <?php endif; ?>
                            <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <a href="<?php echo e(url('')); ?>" style="text-decoration: none; display: block;">
                                    <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                        
                                    </h5>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                
            
            <div class="card-table-title"> <H1>CO-ACADEMIC</H1><br> </div>
            <div class="card-table">
                <?php $__currentLoopData = $organizationCoAcademic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orgCoAcad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        
                        <?php if($orgCoAcads->logo = null): ?>
                        <img src="" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <?php endif; ?>
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="<?php echo e(url('')); ?>" style="text-decoration: none; display: block;">
                                <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                    <?php echo e($orgCoAcads->name); ?>

                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="card-table-title"> <H1>SOCIO-CIVIC</H1><br> </div>
            <div class="card-table">
                <?php $__currentLoopData = $organizationSocioCivic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orgSocioCivic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        
                        <?php if($orgSocioCivic->logo = null): ?>
                        <img src="" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <?php endif; ?>
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="<?php echo e(url('')); ?>" style="text-decoration: none; display: block;">
                                <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                    <?php echo e($orgCivic->name); ?>

                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            
            <div class="card-table-title"> <H1>RELIGIOUS</H1><br> </div>
            <div class="card-table">
                <?php $__currentLoopData = $organizationReligious; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $orgRel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        
                        <?php if($orgRel->logo = null): ?>
                        <img src="" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                        <?php endif; ?>
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="<?php echo e(url('')); ?>" style="text-decoration: none; display: block;">
                                <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                    <?php echo e($orgRel->name); ?>

                                </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </Center>
        
    </table>
    
     </div>
     

</div>



</div>

<script>
    // Show the modal when the button is clicked
    document.getElementById("createUserButton").addEventListener("click", function() {
        $('#createUserModal').modal('show');
    });
</script>
</main>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/organization_list.blade.php ENDPATH**/ ?>