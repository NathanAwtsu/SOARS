@extends('navbar.admin_nav')

@section('content')    

<main>
@if (empty($organizations) || count($organizations) === 0)
        <!-- Handle case where no organizations exist -->
        <div class="empty-organizations">
            <p>No organizations found.</p>
        </div>
    @else
        @foreach ($organizations as $organization)
            @if (!empty($organization['id']) && !empty($organization['name']))
                <div class="organization" id="{{ $organization['id'] }}" style="display: none;">
                    <!-- Content for {{ $organization['name'] }} page goes here -->
                    <h1>{{ $organization['name'] }}</h1>
                    <!-- Add any specific content for the organization -->
                    <img src="{{ asset('path_to_uploaded_image') }}" alt="Logo">
                    <!-- Implement upload functionality -->
                    <form action="{{ route('upload_logo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="logo">
                        <input type="hidden" class="organizationName" name="organizationName" value="{{ $organization['name'] }}">
                        <button type="submit">Upload Logo</button>
                    </form>
                </div>
                @else
                
                <div class="empty-organization">
                    <p>This organization is empty or lacks necessary information.</p>
                </div>
            @endif
        @endforeach
    @endif


    <script>
        window.onload = function() {
            let content = "{{ $content }}";
            showContent(content);
        }

        function showContent(contentId) {
            const organizations = document.querySelectorAll('.organization');
            organizations.forEach(org => {
                org.style.display = 'none';
            });

            document.getElementById(contentId).style.display = 'block';
        }

    </script>

</main>

@endsection