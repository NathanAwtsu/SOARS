<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SOARS') }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    


    <!-- Fonts -->
    <link href="{{ asset('bootstrap-5.3.2-dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admingeneral.css')}}">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css')}}" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="{{url('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js')}}"></script>
    <script src="{{url('https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js')}}"></script>
    
    @stack('styles')
    @stack('jquery')
    

    <!-- Scripts -->
    @vite(['resources/sass/app.scss'])  
</head>
<body>
    <!--Sidebar portion-->
    <div class="container-fluid">
        <div class="row">
            <header>
                <nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
                    <div class="container">
                        <a class="navbar-brand">
                        @if (Route::is('admin'))
                            <h2>Dashboard</h2>
                        @elseif (Route::is('studlist'))
                            <h2>Manage Users</h2>
                        @elseif (Route::is('auditlog'))
                            <h2>Audit Log</h2>
                        @elseif (Route::is('admin_profile'))
                            <h2>Admin Profile</h2>
                        @elseif (Route::is('rso_list'))
                            <h2>Student Organization List</h2>
                        @endif
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>
            </header>
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <div class="sidebar-brand">
                            <div class="d-flex align-items-center">
                                <img src="photos/OSA LOGO.png" alt="" style="max-width: 50px; margin-right: 6px;">
                                <h1>SOARS</h1><br> 
                            </div>
                            <div class="admin" style="padding-left: 70px; padding-bottom: 0px;">
                                <h4>Admin</h4>
                            </div>
                        </div>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('admin_profile')}}">
                                <div class="d-flex align-items-center" style="margin-left: -10px;">
                                    <i class="fa-regular fa-circle-user fa-lg"></i>
                                    <span class="ml-2">{{Auth::user()->name}}</span>
                                </div>
                            </a>
                        </li>
                         <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}" >
                                <div class="d-flex align-items-center" style="margin-left: -10px;">
                                    <i class="fa-regular fa-clipboard fa-lg"></i>
                                    <span class="ml-2">Dashboard</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('auditlog')}}">
                                <div class="d-flex align-items-center" style="margin-left: -10px;">
                                    <i class="fa-regular fa-paste fa-lg"></i>
                                    <span class="ml-2">Audit log</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('studlist')}}">
                                <div class="d-flex align-items-center" style="margin-left: -10px;">
                                    <i class="fa-regular fa-address-book fa-lg"></i>
                                    <span class="ml-2">Manage Users</span>
                                </div>
                            </a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/rso_list">
                                <div class="d-flex align-items-center" style="margin-left: -10px;">
                                    <i class="fa-solid fa-users fa-lg"></i>
                                    <span class="ml-2">Organization List</span>
                                </div>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" 
                                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();" style="color:white;">
                                <div class="d-flex align-items-center" style="margin-left: -10px;">
                                    <i class="fa-solid fa-right-from-bracket fa-lg"></i>
                                    <span class="ml-2">{{ __('Logout')}}</span>
                                </div>
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

<main >           
@yield('content')
</main>
            
@stack('scripts')

</body>
</html>