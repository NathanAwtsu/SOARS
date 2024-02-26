
<?php $__env->startSection('content'); ?>


<main>
    <div class="container-report-list">
    
        <div class="table-responsive"> <!-- Add this div to make the table responsive -->
            <div class="col-10" style="padding: 10px;"> <!-- Use the entire row -->
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
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered table-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Organization</th>
                            <th>Event Name</th>
                            <th>Status</th>
                            <th>Collected</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Your table rows here -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</main>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/reports.blade.php ENDPATH**/ ?>