@extends('layouts.app')

@section('content')
<main class="py-4">
    <center>
        <div class="container my-5">
            <div class="login-container">
                <div class="logo-and-heading">
                    <img src={{asset("photos/OSA LOGO.png")}} alt="" class="custom-image2">
                    <h1>SOARS</h1><br>
                </div>
                <h2>Office of Student Affairs</h2><br>
                
                    <p>Please wait check your email for verification</p>
                    
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="color:white;">
        @csrf
    </form>
                <img src="/photos/adulogo.png" alt="" class="custom-image">
            </div>
        </div>
    </center>
    </main>
@endsection
