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
    @vite(['resources/sass/app.scss'])
</head>
<body>

    <div class="position-absolute top-50 start-50 translate-middle">
    <button class="btn btn-danger" type="button" href="{{ route('logout') }}" onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">Session Expired</button>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="color:white;">
        @csrf
    </form>

    </div>
