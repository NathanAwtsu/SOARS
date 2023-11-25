<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SOARS</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/admingeneral.css')}}">
</head>-->
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
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/admingeneral.css')}}">
    @stack('styles')
    @stack('jquery')

    <!-- Scripts -->
    
</head>
<body>
    <!--Hamburger Menu-->
    <nav id="sidebar" class="navbar bg-body-tertiary" >
        <div class="container-fluid" style="height: 100%;">
            <!--Toggler-->
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <div class="d-flex align-items-center">
                    <span class="navbar-toggler-icon"></span>
                        <h3 style="margin-top:10px">SOARS</h3><br> 
                </div>
            </button>
            <!--Content-->
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="background-color:#064b96;">
                <div class="offcanvas-header d-flex justify-content-between align-items-center">
                    <div class="sidebar-brand">
                        <div class="d-flex align-items-center">
                            <h1 style="color:white;">SOARS</h1> 
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="color:white;"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin') }}" style="color:white;">
                                {{Auth::user()->username}}
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin') }}" style="color:white;">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/audit_log" style="color:white;">
                                Audit Logs
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('studlist') }}" style="color:white;">
                                Students List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('courselist') }}" style="color:white;">
                                Courses List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" style="color:white;">
                                Organization List
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" 
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();" style="color:white;">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                <!--End of Toggler-->
            </div>
        </div>
    </nav>
            <main class="col-md-12 col-lg-12 px-md-4" style="height: 100%;">
            @yield('content')
            </main>
@stack('scripts')
    
</body>
</html>