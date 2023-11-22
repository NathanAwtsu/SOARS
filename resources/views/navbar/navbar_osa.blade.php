<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SOARS') }}</title>

    <!-- Fonts -->
    <link href="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!--<link href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{asset('css/OSAgeneral.css')}}">
    
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<!--Hamburger Menu-->

<nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <div class="sidebar-brand">
                <div class="d-flex align-items-center">
                    <img src="OSA LOGO.png" alt="" style="">
                    <h1>SOARS</h1><br> 
                </div>
                <div class="admin" >
                    <h4>OSA</h4>
                </div>
            </div>
            <li class="nav-item">
                <a class="nav-link active" href="{{url('/osaemp/user'))}}" style="color:white;">
                    {{Auth::user()->username}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{url('/osaemp/dashboard')}}" style="color:white;">
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="" style="color:white;">
                    Reports
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('')}}" style="color:white;">
                    Organizations
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="OSAapproval.html" style="color:white;">
                    Approval Request
                </a>
            </li>
        
            <li class="nav-item">
                <a class="nav-link" href="{{url('/osaemp/userlist')}}" style="color:white;">
                    Student List
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
</nav>




@yield('content')
