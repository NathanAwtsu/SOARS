<?php $__env->startSection('content'); ?>



<main style="padding-left: 250px; overflow-x: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="<?php echo e(url('/chatify')); ?>" class="card" style="height: 130px; background-color: #e57373; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-regular fa-message"></i> Messages </h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="OSAreports.html" class="card" style="height: 130px; background-color: #81c784; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-chart-line"></i> Activities 25</h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="organization-activation.html" class="card" style="height: 130px; background-color: #64b5f6; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-sitemap"></i> Organization Activation</h2>
                    <p style="font-size: 20px; color: white;"></p>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="<?php echo e(url('/osaemp/userlist')); ?>" class="card" style="height: 130px; background-color: #ffb74d; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-users fa-lg"></i> Members </h2>
                    
                </a>
            </div>
        </div>
    </div>
</main>
<div class="container">
    <h1>Laravel FullCalender Tutorial Example - ItSolutionStuff.com</h1>
    <div id='calendar'></div>
</div>
   
<script>
$(document).ready(function () {
   
var SITEURL = "<?php echo e(url('/')); ?>";
  
$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
  
var calendar = $('#calendar').fullCalendar({
                    editable: true,
                    events: SITEURL + "/fullcalender",
                    displayEventTime: false,
                    editable: true,
                    eventRender: function (event, element, view) {
                        if (event.allDay === 'true') {
                                event.allDay = true;
                        } else {
                                event.allDay = false;
                        }
                    },
                    selectable: true,
                    selectHelper: true,
                    select: function (start, end, allDay) {
                        var title = prompt('Event Title:');
                        if (title) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
                            $.ajax({
                                url: SITEURL + "/fullcalenderAjax",
                                data: {
                                    title: title,
                                    start: start,
                                    end: end,
                                    type: 'add'
                                },
                                type: "POST",
                                success: function (data) {
                                    displayMessage("Event Created Successfully");
  
                                    calendar.fullCalendar('renderEvent',
                                        {
                                            id: data.id,
                                            title: title,
                                            start: start,
                                            end: end,
                                            allDay: allDay
                                        },true);
  
                                    calendar.fullCalendar('unselect');
                                }
                            });
                        }
                    },
                    eventDrop: function (event, delta) {
                        var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                        var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
  
                        $.ajax({
                            url: SITEURL + '/fullcalenderAjax',
                            data: {
                                title: event.title,
                                start: start,
                                end: end,
                                id: event.id,
                                type: 'update'
                            },
                            type: "POST",
                            success: function (response) {
                                displayMessage("Event Updated Successfully");
                            }
                        });
                    },
                    eventClick: function (event) {
                        var deleteMsg = confirm("Do you really want to delete?");
                        if (deleteMsg) {
                            $.ajax({
                                type: "POST",
                                url: SITEURL + '/fullcalenderAjax',
                                data: {
                                        id: event.id,
                                        type: 'delete'
                                },
                                success: function (response) {
                                    calendar.fullCalendar('removeEvents', event.id);
                                    displayMessage("Event Deleted Successfully");
                                }
                            });
                        }
                    }
 
                });
 
});
 
function displayMessage(message) {
    toastr.success(message, 'Event');
} 
  
</script>





<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/osaemp.blade.php ENDPATH**/ ?>