@extends('layouts.login')

@section('content')

<center>
    <div class="container my-5">
        <div class="login-container">
            <form method="POST" action="{{ route('login') }}">
                @csrf
            <div class="logo-and-heading">
                <img src="photos/OSA LOGO.png" alt="" class="custom-image2">
                <h1>SOARS</h1><br>
            </div>
            <h2>Office of Student Affairs</h2>
            <form>
                <div class="form-group">
                    <label for="username">Email:</label>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" 
                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter your Email">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input id="password" type="password" class="form-control @error('password') 
                    is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter your password">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                </div>

                <div class="form-group">
                    @isset($_GET['timeout'])
                        <h3 style="text-align: center; color: orangered">You've been automatically Logged out.</h3>
                    @endisset
                </div>

    
                <div>
                <button type="submit" id="loginButton">{{ __('Login')}}</button>
                <strong>Google reCAPTCHA:</strong>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Errors!</strong> <br>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}
                <!---@if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
                --->
                </div>
            </form>
            <img src="/photos/adulogo.png" alt="" class="custom-image">
        </div>
    </div>
</center>

@endsection

