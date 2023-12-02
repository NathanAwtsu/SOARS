@extends('navbar.navbar_osa')
@section('content')
<!--CARDS -->
<main style="padding-left: 250px; overflow-x: hidden;">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-3">
                <a href="{{url('/chatify')}}" class="card" style="height: 130px; background-color: #e57373; text-decoration: none;">
                    <h2 style="color: white;">
                        <i class="fa-regular fa-message"></i> 
                        Messages
                        <div class="pending-notification">
                        </div>                        
                    </h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{url('/osaemp/activities')}}" class="card" style="height: 130px; background-color: #81c784; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-chart-line"></i> Activities 
                    </h2>
                    
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="organization-activation.html" class="card" style="height: 130px; background-color: #64b5f6; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-sitemap"></i> Organization Activation</h2>
                    <p style="font-size: 20px; color: white;">100</p>
                </a>
            </div>
            <div class="col-md-3 mb-3">
                <a href="{{url('/osaemp/userlist')}}" class="card" style="height: 130px; background-color: #ffb74d; text-decoration: none;">
                    <h2 style="color: white;"><i class="fa-solid fa-users fa-lg"></i> Members </h2>
                    
                </a>
            </div>
        </div>
    </div>






</main>






@extends('layouts.footer')
@endsection