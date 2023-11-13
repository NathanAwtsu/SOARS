
@extends('layouts.bootstrapheaderlink')

@section('content')

<!-- Sidebar portion -->
<div class="container-fluid">
    <div class="row">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
                <div class="container">
                    <a class="navbar-brand" style="margin-left:200px"><h2>Dashboard</h2></a>
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
        </header>
        <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
            <div class="position-sticky">
                <ul class="nav flex-column">
                    <div class="sidebar-brand">
                        <div class="d-flex align-items-center">
                            <img src="/photos/OSA LOGO.png" alt="" style="max-width: 50px; margin-right: 6px;">
                            <h1>SOARS</h1><br> 
                        </div>
                        <div class="admin" style="padding-left: 70px; padding-bottom: 0px;">
                            <h4>OSA</h4>
                        </div>
                    </div>
                    <li class="nav-item">
                        <a class="nav-link active" href="OSAprofile.html">
                            User Name
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="OSAdashboard.html">
                            Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="OSAreports.html">
                            Reports
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">
                            Organization Activation
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="OSAapproval.html">
                            Approval Request
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="OSAaudit.html">
                            Audit Log
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="OSAuserlist.html">
                            User List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="OSAorglist.html">
                            Organization List
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>

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
<script src="/bootstrap-5.3.2-dist/js/bootstrap.js"></script>
</body>
</html>
@endsection
