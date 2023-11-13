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
                            {{Auth::user()->username}}
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

