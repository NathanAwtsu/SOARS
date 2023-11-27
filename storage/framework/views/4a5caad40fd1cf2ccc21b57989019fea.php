<?php $__env->startSection('content'); ?>    


    <Center><main>
        <div class="card-table-title"> <H1>ACADEMIC</H1><br> </div>
        <div class="card-table">

            
            <div class="card">
                <a href="<?php echo e(route('rso_detail', ['content' => 'acomss'])); ?>" onclick="showContent('acomss')">
                <img src="card1.jpg" alt="Card 1">
                <h2>ACOMMS</h2>
                <p>Adamson Computer Science Students Society (ACOMSS)</p>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo e(route('rso_detail', ['content' => 'adusvstsophia'])); ?>" onclick="showContent('adusvstsophia')">
                <img src="card2.jpg" alt="Card 2">
                <h2>AdUSVST SOPHIA</h2>
                <p>Card description goes here.</p>
                </a>
            </div>
            <div class="card">
                <a href="<?php echo e(route('rso_detail', ['content' => 'aubs'])); ?>" onclick="showContent('aubs')">
                <img src="card3.jpg" alt="Card 3">
                <h2>AUBS</h2>
                <p>Card description goes here.</p>
                </a>
            </div>
            <div class="card">
                <img src="card4.jpg" alt="Card 4">
                <h2>Card 4</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card5.jpg" alt="Card 5">
                <h2>Card 5</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card6.jpg" alt="Card 6">
                <h2>Card 6</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card7.jpg" alt="Card 7">
                <h2>Card 7</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card8.jpg" alt="Card 8">
                <h2>Card 8</h2>
                <p>Card description goes here.</p>
            </div>
        </div>
        
        <div class="card-table-title"> <H1>CO-ACADEMIC</H1></div>
    <div class="card-table">
        
        <div class="card">
            <img src="card3.jpg" alt="Card 3">
            <h2>Card 3</h2>
            <p>Card description goes here.</p>
        </div>
        <div class="card">
            <img src="card3.jpg" alt="Card 3">
            <h2>Card 3</h2>
            <p>Card description goes here.</p>
        </div>
        <div class="card">
            <img src="card3.jpg" alt="Card 3">
            <h2>Card 3</h2>
            <p>Card description goes here.</p>
        </div>
        <div class="card">
            <img src="card3.jpg" alt="Card 3">
            <h2>Card 3</h2>
            <p>Card description goes here.</p>
        </div>
        
    </div>
    <div class="card-table-title"> <H1>SOCIO-CIVIC</H1><br> </div>
        <div class="card-table">

            
            <div class="card">
                <img src="card1.jpg" alt="Card 1">
                <h2>Card 1</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card2.jpg" alt="Card 2">
                <h2>Card 2</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card3.jpg" alt="Card 3">
                <h2>Card 3</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card4.jpg" alt="Card 4">
                <h2>Card 4</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card5.jpg" alt="Card 5">
                <h2>Card 5</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card6.jpg" alt="Card 6">
                <h2>Card 6</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card7.jpg" alt="Card 7">
                <h2>Card 7</h2>
                <p>Card description goes here.</p>
            </div>
            <div class="card">
                <img src="card8.jpg" alt="Card 8">
                <h2>Card 8</h2>
                <p>Card description goes here.</p>
            </div>
        </div>
       
    </main></Center>

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

<?php echo $__env->make('navbar.admin_nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\soarsWebProject\resources\views/student_orgs/rso_list.blade.php ENDPATH**/ ?>