@extends('navbar.navbar_osa')
@section('content')

<center>
    
    <main>
       
    <div class="card" style="height: auto; width: 700px;">
        <h2>Organization Information Form</h2> <br><br>
        <form action="/osaemp/organization_list/new_organization" method="post" enctype="multipart/form-data">
            @csrf
            <label for="OrgName"><h2>Organization Name :</h2></label><br>
            <textarea id="name" name="name" rows="2" cols="4" required></textarea><br><br>
            <label for="OrgName"><h2>Nickame :</h2></label><br>
            <textarea id="name" name="nickname" rows="2" cols="4" required></textarea><br><br>
            <label for="Mission"><h2>Insert Mission :</h2></label><br>
            <textarea id="mission" name="mission" rows="4" cols="50" ></textarea><br><br>

            <label for="Vision"><h2>Insert Vision:</h2> </label><br>
            <textarea id="vision" name="vision" rows="4" cols="50" ></textarea><br><br>

            <label for="janeContact" style="text-align:left;"> Organization Email:</label>
            <input type="org_email" id="org_email" name="org_email" ><br>

            <label for="janeContact" style="text-align:left;"> Organization Facebook:</label>
            <input type="org_fb" id="org_fb" name="org_fb" ><br>

            <label for="OrganizationType"><h2>First Select Organization Type</h2></label>
             <select id="type_of_organization" name="type_of_organization" onchange="showHideOthers(this);" required>
                <option value="Academic">Academic</option>
                <option value="Co-Academic">Co-Academic</option>
                <option value="Socio Civic">Socio Civic</option>
                <option value="Religious">Religious</option>
             </select><br></br>
            
            <!--Logo-->
            <label for="logoFile"><h3>Logo:</h3></label>
            
            
            <label for="logo" style="background-color: #007bff; color: #fff; margin-right:550px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                <span>Upload logo</span>
                <input type="file" id="logo" name="logo" accept=".png, .jpg, .jpeg" style="display: none;">
            </label><br><br>
            


            <!--Constitution and By Laws-->
            <label for="Constitutions"><h2>Upload Constitutions & ByLaws:</h2></label>
           
            
            <label for="consti_and_byLaws" style="background-color: #007bff; color: #fff; margin-right:450px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                <span>Upload Constitution-Bylaws</span>
                <input type="file" id="consti_and_byLaws" name="consti_and_byLaws" accept=".pdf" style="display: none;"><br><br>
            </label>
            <br><br>
            
            
            
            
            <!--Letter of Intent--->
            <label for="letterOfIntentFile"><h2>Letter of Intent:</h2></label>
            
            
            <label for="letter_of_intent" style="background-color: #007bff; color: #fff; margin-right:450px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                <span>Upload Letter of Intent</span>
                <input type="file" id="letter_of_intent" name="letter_of_intent" accept=".pdf" style="display: none;">
            </label><br><br>
            


            <!---Admin Endorsement--->
            <label for="admin_endorsement"><h2>Admin Endorsement</h2></label>
            <label for="admin_endorsement" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                <span>Upload Admin Endorsement</span>
                <input type="file" id="admin_endorsement" name="admin_endorsement" accept=".pdf" style="display: none;">
            </label><br><br>
            

            <label for="advisersInfoText">
                <h2>Enter Advisers and Officers Information:</h2>
            </label>
            
            <div id="listOfOfficersContent" class="card mt-4 mb-4" style="height: auto;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;" ><h2>Adviser:</h2></label>
                                    <label for="janeName" style="text-align:left;">Name:</label>
                                    <input type="text" id="adviser_name" name="adviser_name"><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="text" id="adviser_name" name="adviser_email" ><br>
                                    <label for="janeContact" style="text-align:left;">Photo:</label>
                                    <label for="adviser_photo" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <span>Upload Adviser Photo</span>
                                        <input type="file" id="adviser_photo" name="adviser_photo" aaccept=".png, .jpg, .jpeg" style="display: none;">
                                    </label><br><br>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>AUSG Representative:</h5></label>
                                    <label for="ausg_rep_studno" style="text-align:left;">Student No:</label>
                                    <input type="text" id="ausg_rep_studno" name="ausg_rep_studno" maxlength="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="ausg_rep_name" name="ausg_rep_name" ><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="email" id="ausg_rep_email" name="ausg_rep_email" ><br>
                                    <label for="janeContact" style="text-align:left;">Photo:</label>
                                    <label for="ausg_rep_photo" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <span>Upload AUSG Photo</span>
                                        <input type="file" id="ausg_rep_photo" name="ausg_rep_photo" accept=".png, .jpg, .jpeg" style="display: none;">
                                    </label><br><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>President:</h5></label>
                                    <label for="president_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="president_studno" name="president_studno" maxlength="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="president_name" name="president_name" ><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="email" id="president_email" name="president_email" ><br>
                                    <label for="janeContact" style="text-align:left;">Photo:</label>
                                    <label for="president_photo" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <span>Upload President Photo</span>
                                        <input type="file" id="president_photo" name="president_photo" accept=".png, .jpg, .jpeg" style="display: none;">
                                    </label><br><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Vp Internal:</h5></label>
                                    <label for="vp_internal_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="vp_internal_studno" name="vp_internal_studno" maxlength="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="vp_internal_name" name="vp_internal_name" ><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="email" id="vp_internal_email" name="vp_internal_email" ><br>
                                    <label for="janeContact" style="text-align:left;">Photo:</label>
                                    <label for="vp_internal_photo" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <span>Upload VP Internal Photo</span>
                                        <input type="file" id="vp_internal_photo" name="vp_internal_photo" accept=".png, .jpg, .jpeg" style="display: none;">
                                    </label><br><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Vp External:</h5></label>
                                    <label for="vp_external_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="vp_external_studno" name="vp_external_studno" maxlength="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="vp_external_name" name="vp_external_name" ><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="email" id="vp_external_email" name="vp_external_email" ><br>
                                    <label for="janeContact" style="text-align:left;">Photo:</label>
                                    <label for="vp_external_photo" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <span>Upload VP External Photo</span>
                                        <input type="file" id="vp_external_photo" name="vp_external_photo" accept=".png, .jpg, .jpeg" style="display: none;">
                                    </label><br><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Secretary:</h5></label>
                                    <label for="secretary_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="secretary_studno" name="secretary_studno" maxlength="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="secretary_name" name="secretary_name" ><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="email" id="secretary_email" name="secretary_email" ><br>
                                    <label for="janeContact" style="text-align:left;">Photo:</label>
                                    <label for="secretary_photo" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <span>Upload Secretary Photo</span>
                                        <input type="file" id="secretary_photo" name="secretary_photo" accept=".png, .jpg, .jpeg" style="display: none;">
                                    </label><br><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Treasurer:</h5></label>
                                    <label for="treasurer_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="treasurer_studno" name="treasurer_studno" maxlength="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="treasurer_name" name="treasurer_name" ><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="email" id="treasurer_email" name="treasurer_email" ><br>
                                    <label for="janeContact" style="text-align:left;">Photo:</label>
                                    <label for="treasurer_photo" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <span>Upload Treasurer Photo</span>
                                        <input type="file" id="treasurer_photo" name="treasurer_photo" accept=".png, .jpg, .jpeg" style="display: none;">
                                    </label><br><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Auditor:</h5></label>
                                    <label for="auditor_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="auditor_studno" name="auditor_studno" maxlength="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="auditor_name" name="auditor_name" ><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="email" id="auditor_email" name="auditor_email" ><br>
                                    <label for="janeContact" style="text-align:left;">Photo:</label>
                                    <label for="auditor_photo" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <span>Upload Auditor Photo</span>
                                        <input type="file" id="auditor_photo" name="auditor_photo" accept=".png, .jpg, .jpeg" style="display: none;">
                                    </label><br><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>PRO:</h5></label>
                                    <label for="pro_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="pro_studno" name="pro_studno" maxlength="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="pro_name" name="pro_name" ><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="email" id="pro_email" name="pro_email" ><br>
                                    <label for="janeContact" style="text-align:left;">Photo:</label>
                                    <label for="pro_photo" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                                        <span>Upload Pro Photo</span>
                                        <input type="file" id="pro_photo" name="pro_photo" accept=".png, .jpg, .jpeg" style="display: none;">
                                    </label><br><br>
                            </div>
                        </div>

                        


                        <input type="submit" value="Submit">
                        
                    </div>
                </div>
            </div>
        </form>
    </main>
</center>
            

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