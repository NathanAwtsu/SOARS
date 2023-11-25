@extends('navbar.navbar_osa')
@section('content')

<center><main>
       
    <div class="card" style="height: auto; width: 600px;">
        <h2>Organization Information Form</h2>

        <form action="submit_organization.php" method="post" enctype="multipart/form-data">
            <label for="missionVision">Mission and Vision:</label><br>
            <textarea id="missionVision" name="missionVision" rows="4" cols="50" required></textarea><br><br>

            
            <label for="Constitutions">Upload Constitutions:</label>
            <input type="file" id="logoFile" name="logoFile" accept=".png, .jpg, .jpeg, .pdf" required><br><br>

            <label for="byLaws">Upload Bylaws:</label>
            <input type="file" id="logoFile" name="logoFile" accept=".png, .jpg, .jpeg, .pdf" required><br><br>

            <label for="logoFile">Upload Logo:</label>
            <input type="file" id="logoFile" name="logoFile" accept=".png, .jpg, .jpeg" required><br><br>

            <label for="letterOfIntentFile">Upload Letter of Intent:</label>
            <input type="file" id="letterOfIntentFile" name="letterOfIntentFile" accept=".pdf" required><br><br>

            <label for="advisersInfoFile">Upload Advisers and Officers Information:</label>
            <input type="file" id="advisersInfoFile" name="advisersInfoFile" accept=".pdf" required><br><br>

            <label for="adviserEndorsementFile">Upload Adviser Endorsement:</label>
            <input type="file" id="adviserEndorsementFile" name="adviserEndorsementFile" accept=".pdf" required><br><br>

            <input type="submit" value="Submit">
        </form>
    </div>
</main></center>

@endsection