
@extends('navbar.navbar_osa')
@section('content')

<nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
    <div class="container">
        <a class="navbar-brand" href="#"><h2>Dashboard</h2></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <form class="form-inline">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary" type="submit">Search</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>

<main>
    <div class="card-table">

        
        <div class="card">
            
           <a href=""><h2>Messages</h2></a>
            <p style="font-size: 30px;">20</p>
        </div>
        <div class="card">
            
            <a href=""><h2>Activities</h2></a>
            <p style="font-size: 30px;">25</p>
        </div>
        <div class="card">
            
            <a href=""><h2>Organization Activation</h2></a>
            <p style="font-size: 30px;">100</p>
        </div>
        <div class="card">
            
            <a href="OSAreports.html"><h2>Reports</h2></a>
            <p style="font-size: 30px;">70</p>
        </div>
       
    </div>
    
</main>
@endsection