@extends('navbar.navbar_student')
@section('content')

</head>
<body>
<main style="overflow-x: hidden;">
    <div class="container">
        <h1 style="padding-left:20px; padding-top: 8%; padding-bottom: 2.5%;">
            <i class="fas fa-bullhorn"></i> Announcements
        </h1>
        <div class="announcement" style="margin-bottom:5%;">
            
                <div class="announcement-header">
                    <h3 class="announcement-title">
                        <i class="fa-regular fa-clipboard"></i> Title:
                    </h3>
                    <p class="announcement-date">Posted on January 25, 2024</p>
                    <p class="author">Author</p>
                </div>
                <div class="announcement-body">
                    <p class="announcement-content">
                    Message
                    </p>
                </div>
            
        </div>
    </div>
</main>

 
 </body>
 </html>
 
@endsection
