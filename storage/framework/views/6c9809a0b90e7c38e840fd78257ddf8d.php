<?php $__env->startSection('content'); ?>

<center>
    
    <main>
       
    <div class="card" style="height: auto; width: 700px;">
        <h2>Organization Information Form</h2> <br><br>
        <form action="/osaemp/organization_list/new_organization" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <label for="OrgName"><h2>Organization Name :</h2></label><br>
            <textarea id="name" name="name" rows="2" cols="4" ></textarea><br><br>
            <label for="Mission"><h2>Insert Mission :</h2></label><br>
            <textarea id="mission" name="mission" rows="4" cols="50" ></textarea><br><br>

            <label for="Vision"><h2>Insert Vision:</h2> </label><br>
            <textarea id="vision" name="vision" rows="4" cols="50" ></textarea><br><br>

            <label for="OrganizationType"><h2>First Select Organization Type</h2></label>
             <select id="type_of_organization" name="type_of_organization" required>
                <option value="Academic">Academic</option>
                <option value="Co-Academic">Co-Academic</option>
                <option value="Socio Civic">Socio Civic</option>
                <option value="Religious">Religious</option>
             </select><br></br>
            
            <label for="Constitutions"><h2>Please Select and Upload Constitutions & ByLaws:</h2></label>
            <input type="file" id="consti_and_byLaws" name="logoFile" accept=".png, .jpg, .jpeg, .pdf" ><br><br>

            <label for="logoFile"><h2>And then Select and Upload Logo:</h2></label>
            <input type="file" id="logo" name="logo" accept=".png, .jpg, .jpeg" ><br><br>

            <label for="letterOfIntentFile"><h2>As well as Upload Letter of Intent:</h2></label>
            <input type="file" id="letter_of_intent" name="letter_of_intent" accept=".pdf" ><br><br>

            <label for="advisersInfoText">
                <h2>Almost there! Enter Advisers and Officers Information:</h2>
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
                                    <input type="text" id="adviser_name" name="adviser_name" ><br>
                            </div>
                        </div>
                    </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>AUSG Representative:</h5></label>
                                    <label for="ausg_rep_studno" style="text-align:left;">Student No:</label>
                                    <input type="text" id="ausg_rep_studno" name="ausg_rep_studno" ><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="ausg_rep_name" name="ausg_rep_name" ><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>President:</h5></label>
                                    <label for="president_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="president_studno" name="president_studno" max="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="president_name" name="president_name" ><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Vp Internal:</h5></label>
                                    <label for="vp_internal_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="vp_internal_studno" name="vp_internal_studno" max="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="vp_internal_name" name="vp_internal_name" ><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Vp External:</h5></label>
                                    <label for="vp_external_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="vp_external_studno" name="vp_external_studno" max="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="vp_external_name" name="vp_external_name" ><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Secretary:</h5></label>
                                    <label for="secretary_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="secretary_studno" name="secretary_studno" max="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="secretary_name" name="secretary_name" ><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Treasurer:</h5></label>
                                    <label for="treasurer_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="treasurer_studno" name="treasurer_studno" max="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="treasurer_name" name="treasurer_name" ><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>Auditor:</h5></label>
                                    <label for="auditor_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="auditor_studno" name="auditor_studno" max="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="auditor_name" name="auditor_name" ><br>
                            </div>
                        </div>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h5>PRO:</h5></label>
                                    <label for="pro_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="pro_studno" name="pro_studno" max="9"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="pro_name" name="pro_name" ><br>
                            </div>
                        </div>

                        <label for="adviserEndorsementFile"><h2>Almost done! Upload Adviser Endorsement File:</h2></label>
                        <input type="file" id="adviserEndorsementFile" name="adviserEndorsementFile" accept=".pdf" ><br><br>
                        <input type="submit" value="Submit" >
                        
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






<?php $__env->stopSection(); ?>
<?php echo $__env->make('navbar.navbar_osa', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\SOARS Github\SOARS\resources\views/OSA/organization_new.blade.php ENDPATH**/ ?>