<?php $__env->startSection('content'); ?>

<?php if(session('success')): ?>
<div class="alert alert-success">
    <?php echo e(session('success')); ?>

</div>
<?php endif; ?>


    <div class="container">
        <div class="row">
            <div class="col mb-3">
                <a href="#" class="card" style="height: 130px; background-color: #E7700D; text-decoration: none;" onclick="openCreatePostModal()">
                    <h2 style="color: white;"><i class="fa-solid fa-bullhorn"></i> Create an Announcement </h2>
                </a>
            </div>

            <div class="col mb-3">
                <a href="<?php echo e(url('/chatify')); ?>" class="card" style="height: 130px; background-color: #e57373; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-regular fa-message"></i> Messages </h2>
                    
                </a>
            </div>
            <div class="col mb-3">
                <a href="<?php echo e(url('/osaemp/activities')); ?>" class="card" style="height: 130px; background-color: #81c784; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-chart-line"></i> Activities <?php echo e($totalEvent->count()); ?></h2>
                    
                </a>
            </div>
            <div class="col mb-3">
                <a href="<?php echo e(url('/osaemp/organization_activation')); ?>" class="card" style="height: 130px; background-color: #64b5f6; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-sitemap"></i> Org Activation <?php echo e($totalPendingOrg->count()); ?></h2>
                    <p style="font-size: 20px; color: white;"></p>
                </a>
            </div>
            <div class="col mb-3">
                <a href="<?php echo e(url('/osaemp/userlist')); ?>" class="card" style="height: 130px; background-color: #8b00d6; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-users fa-lg"></i> Members <?php echo e($totalMember->count()); ?></h2>
                    
                </a>
            </div>
        </div>
    </div>


    <div class="container">

    </div>

    <div class="container">
        <h1>Calendar of Events</h1>
        <div id='calendar' style="background-color: rgb(255, 255, 255); padding: 10px 10px 20px 10px; margin-bottom: 30px;"></div>
    </div>

    <div class="container">
        <h1>Activities</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Activity Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($activity->activity_title); ?></td>
                    <td><?php echo e($activity->activity_start_date); ?></td>
                    <td><?php echo e($activity->activity_end_date); ?></td>
                    <td><?php echo e($activity->activity_start_time); ?></td>
                    <td><?php echo e($activity->activity_end_time); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <div class="container">
        <h1 style="padding-top: 40px; padding-bottom: 20px;">
            <i class="fas fa-bullhorn"></i> Announcements
        </h1>
        <?php if(isset($announcement)): ?>
            
        
        <?php $__currentLoopData = $announcement; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $anncmt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="announcement" style="margin-bottom: 5%; background-color: rgb(181, 181, 181); border-color:black;">
            
                <div class="announcement-header">
                    <h3 class="announcement-title">
                        <i class="fa-regular fa-clipboard"></i> Title: <?php echo e($anncmt->title); ?>

                    </h3>
                    <p class="announcement-date">Posted on <?php echo e($anncmt->created_at); ?></p>
                    <p style="margin-bottom:3px;" class="author">From: <?php echo e($anncmt->author); ?>,  <?php echo e($anncmt->author_org); ?></p>
                </div>
                <div class="announcement-body">
                    <p class="announcement-content">
                        <?php echo e($anncmt->message); ?>

                    </p>
                </div>
            
            <br><br>
        </div>

        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>
        

<div class="modal fade" id="createPostModal" tabindex="-1" role="dialog" aria-labelledby="createPostModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
          <h5 class="modal-title" id="createPostModalLabel">Create an Announcement</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        
        <!-- Modal Body -->
        <form action="/osaemp/announcement" method="post">
            <?php echo csrf_field(); ?>
            <div class="modal-body">
            <!-- Form to create post -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <textarea id="title" name="title" class="form-control"  rows="1"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message">Post Content</label>
                        <textarea id="message" name="message" class="form-control" rows="3"></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="userType">Send to</label>
                        <select class="form-control" id="recipient" name="recipient">
                            <option value="student">Student</option>
                            <option value="studentLeader">Student Leader</option>
                            <option value="Everyone" selected>Everyone</option>
                        </select>
                    </div>
                
            
            <!-- Modal Footer -->
            <div class="modal-footer">
            <!-- Close button -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <!-- Post button -->
            <input type="submit" class="btn btn-primary" id="postButton"></input>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap CSS -->


<!-- JavaScript to handle modal buttons -->
<script>
    $(document).ready(function() {
        // Function to handle post button click
        $("#postButton").click(function() {
            // Your logic to handle post button click goes here
            // For example, you can fetch the post content and send it to the server
            // You can also close the modal after posting if needed
            $('#createPostModal').modal('hide'); // Close the modal
        });

        // Function to handle close button click
        $(".close, [data-dismiss='modal']").click(function() {
            // Close the modal when the close button is clicked
            $('#createPostModal').modal('hide');
        });
    });
</script>
<script>
    function openCreatePostModal() {
        $('#createPostModal').modal('show');
    }
</script>  


        
<script>
    document.addEventListener('DOMContentLoaded', function() {
      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
        
        initialView: 'dayGridMonth',
        headerToolbar: {
          left: 'dayGridMonth,timeGridWeek,timeGridDay',
          center: 'title',
          right: 'prev,next today',
        },
        events: {
          url: '/osaemp/dash', // Specify the URL to fetch events data from
          method: 'GET'
        }
        
      });
      calendar.render();
    });
  </script>
  <script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js'></script>

  <style>
    .announcement {
    background-color: #f0f0f0;
    border: 1px solid black;
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    width: auto;
    margin: auto;
    height: 180px;
    color: black;
    padding-bottom: 10px;
    
    }
    
    .announcement-header {
    border-bottom: 2px solid #ccc;
    margin-bottom: 3px;
    padding-bottom: 3px;
    }
    
    .announcement-title {
    font-size: 24px;
    margin: 0;
    color: black;
    }
    
    .announcement-date {
    color: #666;
    margin: 5px 0;
    }
    
    .announcement-link {
        color: black; /* Set the color to black */
        text-decoration: none; /* Remove underline */
    }
    
    .announcement-content {
    font-size: 15px;
    line-height: 1.6;
    color: black;
    }
    </style>
    
    
  






<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/osaemp.blade.php ENDPATH**/ ?>