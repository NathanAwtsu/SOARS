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
                    <input type="checkbox" name="remember" id="remember" style="width:10%;" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember" for="remember" style="display: inline;">{{__('Remember Me')}}</label>
                </div>
                <div class="form-group">
                    @isset($_GET['timeout'])
                        <h3 style="text-align: center; color: orangered">You've been automatically Logged out.</h3>
                    @endisset
                </div>

    
                <div>
                
                
                
                <button type="submit" id="loginButton">{{ __('Login')}}</button>
            </form>
            <img src="/photos/adulogo.png" alt="" class="custom-image">
        </div>
    </div>
</center>

<!--<script>
    document.getElementById('loginButton').addEventListener('click', function (event) {
        event.preventDefault(); 

        
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        if (email.trim() === '' || password.trim() === '') {
            alert('Please enter both email and password.'); 
            return;
        }

        
        redirectToTermsAndAgreement();
    });

    function redirectToTermsAndAgreement() {
        window.location.href = "{{ route('terms_and_agreement') }}"; 
    }
</script>-->

@endsection

