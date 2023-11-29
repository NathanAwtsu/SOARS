@extends('navbar.navbar_osa')
@section('content')

<center><main>
       
    <div class="card" style="height: auto; width: 700px;">
        <h2>Organization Information Form</h2> <br><br>

        <form action="submit_organization.php" method="post" enctype="multipart/form-data">

            <label for="OrgName"><h2>Organization Name :</h2></label><br>
            <textarea id="OrgName" name="OrgName" rows="2" cols="4" required></textarea><br><br>
            <label for="Mission"><h2>Insert Mission :</h2></label><br>
            <textarea id="Mission" name="Mission" rows="4" cols="50" required></textarea><br><br>

            <label for="Vision"><h2>Insert Vision:</h2> </label><br>
            <textarea id="Vision" name="Vision" rows="4" cols="50" required></textarea><br><br>

            <label for="OrganizationType"><h2>First Select Organization Type</h2></label>
             <select id="OrganizationType" name="OrganizationType" required>
             <option value="option1">Academic</option>
             <option value="option2">Co-Academic</option>
             <option value="option3">Socio Civic</option>
             <option value="option4">Religious</option>
             </select><br><br>
            
            <label for="Constitutions"><h2>Please Select and Upload Constitutions:</h2></label>
            <input type="file" id="logoFile" name="logoFile" accept=".png, .jpg, .jpeg, .pdf" required><br><br>

            <label for="byLaws"><h2>And then Select and Upload Bylaws:</h2></label>
            <input type="file" id="logoFile" name="logoFile" accept=".png, .jpg, .jpeg, .pdf" required><br><br>

            <label for="logoFile"><h2>Also Select and Upload Logo:</h2></label>
            <input type="file" id="logoFile" name="logoFile" accept=".png, .jpg, .jpeg" required><br><br>

            <label for="letterOfIntentFile"><h2>As well as Upload Letter of Intent:</h2></label>
            <input type="file" id="letterOfIntentFile" name="letterOfIntentFile" accept=".pdf" required><br><br>

            <label for="advisersInfoText"><h2>Almost there! Enter Advisers and Officers Information:</h2></label>

            <div class="col-md-4">
                <div class="officer-card" id="officerContainer" style="display: flex; flex-direction: row; gap: 20px;"> <!-- Increased the gap to 20px -->
                    <form action="update_officer_details.php" method="post">
                        <div>
                            <label for="janeName">Name:</label>
                            <input type="text" id="janeName" name="janeName" value="Jane Smith" style="width: 120px;"> <!-- Increased the width to 120px -->
                        </div>
            
                        <div style="margin-left: 70px;">
                            <label for="janePosition">Position:</label>
                            <input type="text" id="janePosition" name="janePosition" value="AUSG Representative" style="width: 180px;"> <!-- Increased the width to 180px -->
                        </div>
            
                        <div style="margin-left: 70px;">
                            <label for="janeContact">Email:</label>
                            <input type="text" id="janeContact" name="janeContact" value="sampleemail.@adu.edu.ph" style="width: 180px;"> <!-- Increased the width to 180px -->
                        </div>
                    </form>
                </div>
            
            
            

<button type="button" onclick="addOfficerForm()">Add Another Officer</button>
<button type="button" id="undoButton" onclick="undoAddOfficerForm()" style="display:none;">Undo</button>
</div>
            
            
<!-- You can provide default text or leave it empty -->
</textarea>


<label for="adviserEndorsementFile"><h2>Almost done! Upload Adviser Endorsement File:</h2></label>
<input type="file" id="adviserEndorsementFile" name="adviserEndorsementFile" accept=".pdf" required><br><br>

<input type="button" value="Submit" onclick="confirmSubmission()">
</form>
    </div>
    </div>
</main></center>

<script>
    var officerContainer = document.getElementById('officerContainer');
    var originalForm = officerContainer.innerHTML;

    function addOfficerForm() {
        var newForm = document.createElement('form');
        newForm.innerHTML = originalForm; // Copy the original form's structure

        officerContainer.parentNode.insertBefore(newForm, officerContainer.nextSibling);

        // Show the Undo button
        document.getElementById('undoButton').style.display = 'inline';
    }
</script>

<script>
    function undoAddOfficerForm() {
        // Remove the last added form
        var forms = document.getElementsByTagName('form');
        if (forms.length > 1) {
            forms[forms.length - 1].remove();
        } else {
            // If there's only one form, reset its content to the original
            officerContainer.innerHTML = originalForm;

            // Hide the Undo button
            document.getElementById('undoButton').style.display = 'none';
        }
    }
</script>
<script>
function confirmSubmission() {
    // Show a confirmation dialog
    var isConfirmed = window.confirm("Are you sure you want to proceed with the submission?");

    // If the user clicks "OK" in the confirmation dialog, submit the form
    if (isConfirmed) {
        document.forms[0].submit(); // Assuming the form is the first form in your document
    }
}
</script>






@endsection