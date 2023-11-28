@extends('navbar.admin_nav')

@section('content')

<!-- Your main content goes here -->
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="container mt-1">
            <div class="rowmain">
                <div class="col-md-6 offset-md-3">
                    <h2>User Profile Setup</h2>
                    <form>
                        <div class="form-group"><br>
                            <img id="preview" src="photos/OSA LOGO.png" alt="Profile Picture" width="150">
                            <label for="profilePicture">Profile Picture</label>
                            <input type="file" class="form-control-file" id="profilePicture" accept="image/*">
                            
                        </div>
                        <div class="form-group"><br>
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" placeholder="Enter your new password">
                        </div>
                        <div class="form-group"><br>
                            <label for="contactNumber">Contact Number</label>
                            <input type="tel" class="form-control" id="contactNumber" placeholder="Enter your contact number">
                        </div>
                        <div class="form-group"><br>
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Enter your email address">
                        </div>
                        <div class="text-right mt-3">
                            <div class="d-flex"><br><br>
                                <button type="button" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-default ml-2">Cancel</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
       
    </main>

    <script>
        let lastScrollTop = 0;
        window.addEventListener("scroll", () => {
            let st = window.pageYOffset || document.documentElement.scrollTop;
            if (st > lastScrollTop) {
                // Scrolling down, hide the header
                document.querySelector(".scroll-header").classList.add("hidden");
            } else {
                // Scrolling up, show the header
                document.querySelector(".scroll-header").classList.remove("hidden");
            }
            lastScrollTop = st;
        });
    </script>

@endsection