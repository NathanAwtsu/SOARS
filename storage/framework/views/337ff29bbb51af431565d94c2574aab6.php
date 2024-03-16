<?php $__env->startSection('content'); ?>


<main>
    <div class="container-report-list">
    
        <div class="table-responsive"> <!-- Add this div to make the table responsive -->
            <div class="col-10" style="padding: 10px;">
                <?php if(session('error')): ?>
            <div class="alert alert-danger">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?> <!-- Use the entire row -->
                <h2 class="text-left">PAST EVENTS</h2>
            </div>
            <table class="table table-bordered table-center"> <!-- Added table-center class -->
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Status</th>
                            <th>Organization</th>
                            <th>Activity Title</th>
                            <th>Type of Activity</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Venue</th>
                            <th>Participants</th>
                            <th>Partner Org</th>
                            <th>Org Fund</th>
                            <th>Solidarity Share</th>
                            <th>Registration Fee</th>
                            <th>AUSG Subsidy</th>
                            <th>Sponsored By</th>
                            <th>Ticket Selling</th>
                            <th>Ticket Control No.</th>
                            <th>Other Source of Fund</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($event->id); ?></td>
                            <td><?php echo e($event->status); ?></td>
                            <td><?php echo e($event->organization_name); ?></td>
                            <td><?php echo e($event->activity_title); ?></td>
                            <td><?php echo e($event->type_of_activity); ?></td>
                            <td><?php echo e($event->activity_start_date); ?></td>
                            <td><?php echo e($event->activity_end_date); ?></td>
                            <td><?php echo e($event->activity_start_time); ?></td>
                            <td><?php echo e($event->activity_end_time); ?></td>
                            <td><?php echo e($event->venue); ?></td>
                            <td><?php echo e($event->participants); ?></td>
                            <td><?php echo e($event->partner_organization); ?></td>
                            <td><?php echo e($event->organization_fund); ?></td>
                            <td><?php echo e($event->solidarity_share); ?></td>
                            <td><?php echo e($event->registration_fee); ?></td>
                            <td><?php echo e($event->AUSG_subsidy); ?></td>
                            <td><?php echo e($event->sponsored_by); ?></td>
                            <td><?php echo e($event->ticket_selling); ?></td>
                            <td><?php echo e($event->ticket_control_number); ?></td>
                            <td><?php echo e($event->other_source_of_fund); ?></td>
                            <td>
                            <a href="<?php echo e(route('generate-certificate', ['eventId' => $event->id])); ?>" class="btn btn-primary">Generate Certificate</a>
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody> 
                    </table>
        </div>
    </div>

   <div class="container-report-list" style="padding-top: 20px;">
    <div class="row">
        <div class="col-10"> <!-- Use the entire row -->
            <h2 class="text-left">PAYPAL TRANSACTIONS</h2>
            <form action="<?php echo e(url('/osaemp/open_registration')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" name="regopen" value="1" id="regopen" class="btn btn-primary mb-3">Open Registration</button>
            </form>
            
            <form action="<?php echo e(url('/osaemp/close_registration')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <button type="submit" name="regclose" value="0" id="regclose" class="btn btn-primary mb-3">Close Registration</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Student No.</th>
                            <th>Name</th>
                            <th>Payment ID</th>
                            <th>Amount</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $paypal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                        
                        <tr>
                            <th><?php echo e($payment->id); ?></th>
                            <th><?php echo e($payment->studno); ?></th>
                            <th><?php echo e($payment->name); ?></th>
                            <th><?php echo e($payment->payment_id); ?></th>
                            <th><?php echo e($payment->amount); ?><?php echo e($payment->currency); ?></th>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/reports.blade.php ENDPATH**/ ?>