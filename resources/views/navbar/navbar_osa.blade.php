<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SOARS') }}</title>

    <!-- Fonts -->
    
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/OSAgeneral.css')}}">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<!--Hamburger Menu-->
<nav id="sidebar" class="navbar bg-body-tertiary" >
    <div class="container-fluid">
        <!--Toggler-->
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        
        <div class="d-flex align-items-center">
            <span class="navbar-toggler-icon"></span>
            <img src="/photos/OSA LOGO.png" alt="" style="max-width: 50px; margin-right: 6px; margin-left: 20px">
            <h1 style="margin-top:10px">SOARS</h1><br> 
        </div>
      </button>
      
      <!--Content-->
      <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color:#064b96; 
      ">
        <div class="offcanvas-header">
            <div class="sidebar-brand">
                <div class="d-flex align-items-center">
                    <img src="/photos/OSA LOGO.png" alt="" style="max-width: 50px; margin-right: 6px;">
                    <h1 style="color:white;">SOARS</h1><br> 
                </div>
                <div class="admin" style="padding-left: 70px; padding-bottom: 0px;">
                    <h4 style="color:white;">OSA</h4>
                </div>
            </div>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav flex-column">
                
                <li class="nav-item">
                    <a class="nav-link active" href="OSAprofile.html" style="color:white;">
                        {{Auth::user()->username}}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="OSAdashboard.html" style="color:white;">
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="OSAreports.html" style="color:white;">
                        Reports
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="" style="color:white;">
                        Organization Activation
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="OSAapproval.html" style="color:white;">
                        Approval Request
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="OSAaudit.html" style="color:white;">
                        Audit Log
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="OSAuserlist.html" style="color:white;">
                        User List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="OSAorglist.html" style="color:white;">
                        Organization List
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();" style="color:white;">
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="color:white;">
                        @csrf
                    </form>
                </li>
            </ul>
          
        </div>
        <!--End of Toggler-->
      </div>
    </div>
  </nav>


@yield('content')

