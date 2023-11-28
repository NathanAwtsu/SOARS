<?php $__env->startSection('content'); ?>    

<!-- Your main content goes here -->
    <main >
        <div class="container-audit">
        <table>
            <tr>
                <th>Date</th>
                <th>Action</th>
                <th>User</th>
                <th>Description</th>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <tr>
                <td>2023-10-15 09:30 AM</td>
                <td>Login</td>
                <td>User123</td>
                <td>User User123 logged in.</td>
            </tr>
            <!-- Add more log entries here -->
        </table>
    </div>
       
    </main>

    <script>
        let lastScrollTop = 0;
        window.addEventListener("scroll", () => {
            let st = window.pageYOffset || document.documentElement.scrollTop;
            if (st > lastScrollTop) {
                // Scrolling down, hide the header
                document.querySelector(".scroll-header").classList.add("hidden");
            } else {
                // Scrolling up, show the header
                document.querySelector(".scroll-header").classList.remove("hidden");
            }
            lastScrollTop = st;
        });
    </script>
    

    <!-- Add Bootstrap JavaScript (optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('navbar.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/Admin/audit_log.blade.php ENDPATH**/ ?>