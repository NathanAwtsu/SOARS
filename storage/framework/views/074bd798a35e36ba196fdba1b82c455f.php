<?php $__env->startSection('content'); ?>

<div class="container-tbl-up" style="padding: 0px 100px;">
            
            
    
        
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <center>
            <div class="btn-group">
                <a class="btn btn-create" type="button" id="createUserButton" style="margin-left: 10px; margin-top: 20px;" href="<?php echo e(url('/osaemp/organization_list/new_organization')); ?>">Create New Organization</a>
                
            </div>
            
            <!--Petitions-->
            <div class="card-table-title" style="padding: 30px 0px 0px 0px;"> 
                <H1>STUDENT PETITION</H1><br> 
            </div>
            <div class="table-responsive" style="overflow-x: auto;"> <!-- Add this div to make the table responsive -->
                <table class="table table-bordered table-center"> <!-- Added table-center class -->
                    <thead>
                        <tr>
                            <th>Student</th>
                            <th>Organization Name</th>
                            <th>Organization Type</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>Status</th>
                            <th>Organization Name</th>
                            <th>Organization Type</th>
                        </tr>
                    </tbody>
                </table>
            </div>

            <?php if($pendings != null): ?>
                <div class="card-table-title" style="padding: 30px 0px 0px 0px;">
                    <h1>PENDING</h1><br>
                </div>
                <div class="card-table" style="margin: 0 0 0 0;">
                    <?php $__currentLoopData = $pendings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $pend): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if($pend != Null): ?>
                            <div class="col-lg-5 col-md-5 col-sm-5">
                                <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                    <img src="/storage/logo/<?php echo e($pend->logo); ?>" alt="<?php echo e($pend->logo); ?>" style="max-width: 200px;">
                                    <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                        <a href="<?php echo e(url('/osaemp/organization_list/pending_edit/'.$pend->id)); ?>" style="text-decoration: none; display: block;">
                                            <h1 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center; text-shadow: -1px -1px 0 #000,  1px -1px 0 #000, -1px  1px 0 #000, 1px  1px 0 #000;">
                                                <?php echo e($pend->name); ?><br>
                                                <?php if($pend->requirement_status >= "100"): ?>
                                                <h3>Requirements Complete</h3>
                                                <?php endif; ?>
                                            </h1>
                                        </a>
                                    </div>
                                    
                                </div>
                                <?php if($pend->requirement_status <= "100" ||  $pend->requirement_status != "complete"): ?>
                                        <progress id="file" value="<?php echo e($pend->requirement_status); ?>" max="100"></progress><br>
                                        <?php echo (round($pend->requirement_status).'% out of 100%');?>
                                <?php endif; ?>

                                
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>

            <div class="card-table-title" style="padding: 30px 0px 0px 0px;"> 
                <H1>ACADEMIC</H1><br> 
            </div>
                <div class="card-table" style="margin: 0 0 0 0;">
                    <?php $__currentLoopData = $organizationAcademic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orgAcads): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($orgAcads != NUll): ?>
                    <div class="col-lg-5 col-md-5 col-sm-5">
                        <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <img src="/storage/logo/<?php echo e($orgAcads->logo); ?>" alt="<?php echo e($orgAcads->logo); ?>" style="max-width: 200px;">
                            <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                <a href="<?php echo e(url('/osaemp/organization_list/organization_page/'.$orgAcads->id)); ?>" style="text-decoration: none; display: block;">
                                    <h1 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center; text-shadow: -1px -1px 0 #000,  1px -1px 0 #000, -1px  1px 0 #000, 1px  1px 0 #000;">
                                        <?php echo e($orgAcads->name); ?><br>
                                        
                                    </h1>
                                </a>
                            </div>
                            
                        </div>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            
                
            
            <div class="card-table-title" style="padding: 30px 0px 0px 0px;"> 
                <H1>CO-ACADEMIC</H1><br> 
            </div>
            <div class="card-table" style="margin: 0 0 0 0;">
                <?php $__currentLoopData = $organizationCoAcademic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orgCoAcad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($orgCoAcad != Null): ?>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <img src="/storage/logo/<?php echo e($orgCoAcad->logo); ?>" alt="<?php echo e($orgCoAcad->logo); ?>" style="max-width: 200px;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="<?php echo e(url('/osaemp/organization_list/organization_page/'.$orgCoAcad->id)); ?>" style="text-decoration: none; display: block;">
                                <h1 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center; text-shadow: -1px -1px 0 #000,  1px -1px 0 #000, -1px  1px 0 #000, 1px  1px 0 #000;">
                                    <?php echo e($orgCoAcad->name); ?><br>
                                    
                                </h1>
                            </a>
                        </div>
                        
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="card-table-title" style="padding: 30px 0px 0px 0px;"> 
                <H1>SOCIO-CIVIC</H1><br> 
            </div>
                <div class="card-table" style="margin: 0 0 0 0;">
                <?php $__currentLoopData = $organizationSocioCivic; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orgSocioCivic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($orgSocioCivic != Null): ?>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <img src="/storage/logo/<?php echo e($orgSocioCivic->logo); ?>" alt="<?php echo e($orgSocioCivic->logo); ?>" style="max-width: 200px;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="<?php echo e(url('/osaemp/organization_list/organization_page/'.$orgSocioCivic->id)); ?>" style="text-decoration: none; display: block;">
                                <h1 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center; text-shadow: -1px -1px 0 #000,  1px -1px 0 #000, -1px  1px 0 #000, 1px  1px 0 #000;">
                                    <?php echo e($orgSocioCivic->name); ?><br>
                                    
                                </h1>
                            </a>
                        </div>
                        
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            
            <div class="card-table-title" style="padding: 30px 0px 0px 0px;"> <H1>RELIGIOUS</H1><br> 
            </div>
            <div class="card-table" style="margin: 0 0 0 0;">
                <?php $__currentLoopData = $organizationReligious; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orgRel): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($orgRel != Null): ?>
                <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                        <img src="/storage/logo/<?php echo e($orgRel->logo); ?>" alt="<?php echo e($orgRel->logo); ?>" style="max-width: 200px;">
                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                            <a href="<?php echo e(url('/osaemp/organization_list/organization_page/'.$orgRel->id)); ?>" style="text-decoration: none; display: block;">
                                <h1 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center; text-shadow: -1px -1px 0 #000,  1px -1px 0 #000, -1px  1px 0 #000, 1px  1px 0 #000;">
                                    <?php echo e($orgRel->name); ?><br>
                                    
                                </h1>
                            </a>
                        </div>
                        
                    </div>
                </div>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </center>
        
    
    
     

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


<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/organization_list.blade.php ENDPATH**/ ?>