@extends('navbar.admin_nav')

@section('content')    
<main>
        <Center>
        @foreach ($categories as $category)
                @if (!empty($category['title']))
                    <div class="card-table-title"> <H1>{{ $category['title'] }}</H1><br> </div>
                    <div class="card-table">
                        @foreach ($category['organizations'] as $organization)
                            @if (!empty($organization['id']) && !empty($organization['name']))
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card" style="position: relative; display: flex; flex-direction: column; justify-content: center; align-items: center; min-height: 185px;">
                                        <img src="photos/OSA LOGO.png" class="card-img-top" alt="Image" style="max-width: 100%; flex-shrink: 0;">
                                        <div class="card-body" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0, 0, 0, 0.7); overflow: hidden; display: flex; flex-direction: column; justify-content: center; align-items: center;">
                                            <a href="{{ route('rso_detail', ['content' => $organization['id']]) }}" onclick="showContent('{{ $organization['id'] }}')" style="width: 100%;">
                                                <h5 class="card-title" style="color: white; margin: 0; padding: 10px; max-height: 100%; overflow: hidden; text-overflow: ellipsis; text-align: center;">
                                                    {{ $organization['name'] }}
                                                </h5>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @elseif (empty($organization['id']) && empty($organization['name']) && empty($organization['organization']))
                                <!-- Handling when both ID, name, and organization are empty -->
                                <div class="col-lg-3 col-md-4 col-sm-6">
                                    <div class="card">
                                        <p>No information available for this organization.</p>
                                        <!-- Add any other content or message for this scenario -->
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @else
                    <!-- Handling when the title is empty -->
                    <p>No title available for this category.</p>
                    <!-- Add any other content or message for this scenario -->
                @endif
            @endforeach
        </Center>
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
    

    <!-- Add Bootstrap JavaScript (optional) -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
@endsection
