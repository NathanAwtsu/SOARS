@extends('navbar.admin_nav')

@section('content')    

<main>
<div class="organization" id="acomss" style="display: none;">
    <!-- Content for ACOMSS page goes here -->
    <h1>Adamson Computer Science Students Society (ACOMSS)</h1>
    <!-- Add any specific content for ACOMSS -->
    <img src="{{ asset('path_to_uploaded_image') }}" class="rounded float-start" alt="Logo">
    <!-- Implement upload functionality -->
    <form action="{{ route('upload_logo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="logo">
        <input type="hidden" class="organizationName" name="organizationName" value="Adamson Computer Science Students Society (ACOMSS)">
        <button type="submit">Upload Logo</button>
    </form>
    
</div>

<div class="organization" id="adusvstsophia" style="display: none;">
    <!-- Content for AdUSVST page goes here -->
    <h1>Adamson University and St. Vincent School of Theology(AdUSVST SOPHIA)</h1>
    <!-- Add any specific content for ACOMSS -->
    <img src="{{ asset('path_to_uploaded_image') }}" alt="Logo">
    <!-- Implement upload functionality -->
    <form action="{{ route('upload_logo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="logo">
        <input type="hidden" class="organizationName" name="organizationName" value="Adamson University and St. Vincent School of Theology(AdUSVST SOPHIA)">
        <button type="submit">Upload Logo</button>
    </form>

</div>

<div class="organization" id="aubs" style="display: none;">
    <!-- Content for AUBS page goes here -->
    <h1>Adamson University Biology Society (AUBS)</h1>
    <!-- Add any specific content for ACOMSS -->
    <img src="{{ asset('path_to_uploaded_image') }}" alt="Logo">
    <!-- Implement upload functionality -->
    <form action="{{ route('upload_logo') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="logo">
        <input type="hidden" class="organizationName" name="organizationName" value="Adamson University Biology Society (AUBS)">
        <button type="submit">Upload Logo</button>
    </form>
    
</div>

    <script>
        // Function to show content based on content parameter
        window.onload = function() {
            let content = "{{ $content }}";
            if (content === 'acomss') {
                showContent('acomss');
            } else if (content === 'adusvstsophia') {
                showContent('adusvstsophia');
            } else if (content === 'aubs') {
                showContent('aubs');
            }
        }

        function showContent(contentId) {
            document.getElementById('acomss').style.display = 'none';
            document.getElementById('adusvstsophia').style.display = 'none';
            document.getElementById('aubs').style.display = 'none';

            document.getElementById(contentId).style.display = 'block';
        }
    </script>

</main>

@endsection