@extends('navbar.navbar_osa')

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="container mt-1">
        <div class="rowmain">
            <div class="col-md-6 offset-md-3">
                <form action="{{ route('user.update') }}" method="post">
                    @csrf
                <h2>User Profile Setup</h2>
                <form>
                    <div class="form-group"><br>
                        <img id="preview" src="/photos/icon.jpg" alt="Profile Picture" width="150">
                        <label for="profilePicture">Profile Picture</label> <br>
                        <input type="file" class="form-control-file" id="profilePicture" accept="image/*">
                        
                    </div>
                    <div class="form-group"><br>
                        
                            
                        
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" placeholder="Enter your Password">
                    </div>
                    <div class="form-group"><br>
                        <label for="contactNumber">Contact Number</label>
                        <input type="tel" class="form-control" id="contactNumber" placeholder="Enter your New Contact Number">
                    </div>
                    <div class="form-group"><br>
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter your email address">
                        
                    </div>
                    <div class="text-right mt-3">
                        <div class="d-flex"><br><br>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button href="{{ route('user.index') }}" class="btn btn-default ml-2">Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
   
</main>

@endsection