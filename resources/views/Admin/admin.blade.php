@extends('navbar.admin_nav')

@section('content')

    <!-- Your main content goes here -->
    
        <style>
            .card-table {
        display: flex;
        justify-content: space-between; /* Adjust as needed */
        }

        .card {
            flex: 1;
            margin: 0 5px; /* Adjust margin between cards */
        }

        .card a {
            text-decoration: none;
            color: inherit;
        }

        .card a:hover {
            text-decoration: none;
            color: inherit;
        }
        </style>
        
        <div class="card-table">
                
            <a href=""><div class="card" style="height: 150px; background-color: #81c784;">
                <h2 style="color: white;">Activities <i class="fa-solid fa-chart-line"></i></h2>
                <p style="font-size: 30px; color: white;">69</p>
            </a>
            </div>
            <a href=""> <div class="card" style="height: 150px; background-color: #64b5f6;">
                <h4 style="color: white;">Member Approval <i class="fa-solid fa-users fa-lg"></i></h4>
                <p style="font-size: 30px; color: white;">69</p>
            </a> 
            </div>
            <a href="{{ route('studlist') }}">
            <div class="card" style="height: 150px; background-color: #64b5f6;">
                <h2 style="color: white;">Total Students <i class="fa-solid fa-users fa-lg"></i></h2>
                    <p style="font-size: 30px; color: white;">{{ $studentCount }}</p>
            </a>
            </div>
            <!--<a href="{{ route('osalist') }}">
            <div class="card" style="height: 150px; background-color: #64b5f6;">
                <h4 style="color: white;">OSA Employees <i class="fa-solid fa-users fa-lg"></i></h4>
                    <p style="font-size: 30px; color: white;">{{ $osaEmployeesCount ?? 'N/A' }}</p>
            </a>
            </div>-->
            
        </div>
    
        
    
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

@endsection
