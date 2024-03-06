@extends('navbar.navbar_osa')
@section('content')


<center>
    
    <main>
       
    <div class="card" style="height: auto; width: 700px;">
        <center>
            <h1>Organization Information Form</h1> <br><br>
        </center>
        
        <form action="/osaemp/organization_list/pending_edit_save/{{$org->id}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            
            <label><h2>Requirement Status: <?php
            if($org->requirement_status == "complete"){
                echo "Requirement Complete";
            }
            
            if($org->requirement_status != "complete" || $org->requirement_status <= '100'){
                echo round($org->requirement_status) . '%';
            }
            ?>
            
                @if($org->requirement_status == 100)
                <button type="submit" name="complete" value="{{$org->id}}" style="background-color: 
                #007bff; color: #fff; padding: 10px 15px; border-radius: 5px; cursor: pointer;">Publish for Completion</button><br>
                @endif
            </h2>
            
            </label>
            <label for="OrgId"><h2>Org ID: {{$org->id}}</h2></label><br>
            <label for="OrgName"><h2>Organization Name:</h2></label><br>
            <textarea id="name" name="name" rows="2" cols="4" required>{{$org->name}}</textarea><br><br>
            <label for="OrgName"><h2>Nickame :</h2></label><br>
            <textarea id="nameickname" name="nickname" rows="2" cols="4" required>{{$org->nickname}}</textarea><br><br>
            <label for="Mission"><h2>Insert Mission :</h2></label><br>
            <textarea id="mission" name="mission" rows="4" cols="50" >{{$org->mission}}</textarea><br><br>

            <label for="Vision"><h2>Insert Vision:</h2> </label><br>
            <textarea id="vision" name="vision" rows="4" cols="50" >{{$org->vision}}</textarea><br><br>

            <label for="OrganizationType"><h2>First Select Organization Type</h2></label>
             <select id="type_of_organization" name="type_of_organization" onchange="showHideOthers(this);" required>
                <option value="Academic"{{$org->type_of_organization == 'Academic' ? 'selected' : ' '}}>Academic</option>
                <option value="Co-Academic" {{$org->type_of_organization == 'Co-Academic' ? 'selected' : ' '}}>Co-Academic</option>
                <option value="Socio Civic" {{$org->type_of_organization == 'Socio Civic' ? 'selected' : ' '}}>Socio Civic</option>
                <option value="Religious" {{$org->type_of_organization == 'Religious' ? 'selected' : ' '}}>Religious</option>
             </select><br></br>


            <!--Logo-->
            <label for="logoFile"><h3>Logo:</h3></label>
            @if (isset($org->logo))
            <h6>File already uploaded:
            <img src="/storage/logo/{{$org->logo}}" alt="{{$org->logo}}" style="max-width: 200px; padding-bottom:10px;">
            </h6>
            <label for="logo" style="background-color: #007bff; color: #fff; margin-right:450px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                <span>Change Logo</span>
                <input type="file" id="logo" name="logo" accept=".png, .jpg, .jpeg" style="display: none;">
            </label><br><br>
            @endif
            @if ($org->logo == null)
            <label for="logo" style="background-color: #007bff; color: #fff; margin-right:550px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                <span>Upload logo</span>
                <input type="file" id="logo" name="logo" accept=".png, .jpg, .jpeg" style="display: none;">
            </label><br><br>
            @endif


            <!--Constitution and By Laws-->
            <label for="Constitutions"><h2>Upload Constitutions & ByLaws:</h2></label>
            @if (isset($org->consti_and_byLaws))
            <h6>File already uploaded:
                <iframe src="/storage/consti_and_bylaws/{{$org->consti_and_byLaws}}" width="100%" height="600px"></iframe>
                </h6>

                <label for="consti_and_byLaws" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                    <span>Change Constitution and By Laws</span>
                    <input type="file" id="consti_and_byLaws" name="consti_and_byLaws" accept=".pdf" style="display: none;">
                </label><br><br>
                
            @endif
            @if ($org->consti_and_byLaws == null)
            <label for="consti_and_byLaws" style="background-color: #007bff; color: #fff; margin-right:450px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                <span>Upload Constitution-Bylaws</span>
                <input type="file" id="consti_and_byLaws" name="consti_and_byLaws" accept=".pdf" style="display: none;"><br><br>
            </label>
            <br><br>
            @endif
            
            
            
            <!--Letter of Intent--->
            <label for="letterOfIntentFile"><h2>Letter of Intent:</h2></label>
            @if (isset($org->letter_of_intent))
            <h6>File already uploaded:
                <iframe name="letter_of_intent" src="/storage/letter_of_intent/{{$org->letter_of_intent}}" width="100%" height="600px"></iframe>
                </h6>

                <label for="letter_of_intent" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                    <span>Change Letter of Intent</span>
                    <input type="file" id="letter_of_intent" name="letter_of_intent" accept=".pdf" style="display: none;">
                </label><br><br>
            @endif
            @if ($org->letter_of_intent == null)
            <label for="letter_of_intent" style="background-color: #007bff; color: #fff; margin-right:450px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                <span>Upload Letter of Intent</span>
                <input type="file" id="letter_of_intent" name="letter_of_intent" accept=".pdf" style="display: none;">
            </label><br><br>
            @endif


            <!---Admin Endorsement--->
            <label for="admin_endorsement"><h2>Admin Endorsement</h2></label>
            @if (isset($org->admin_endorsement))
            <h6>File already uploaded:
                <iframe src="/storage/admin_endorsement/{{$org->admin_endorsement}}" width="100%" height="600px"></iframe>
                </h6>

                <label for="admin_endorsement" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                    <span>Change Admin Endorsement</span>
                    <input type="file" id="admin_endorsement" name="admin_endorsement" accept=".pdf" style="display: none;">
                </label><br><br>
                
            @endif
            
            @if ($org->admin_endorsement == null)
            <label for="admin_endorsement" style="background-color: #007bff; color: #fff; margin-right:400px; padding: 10px 15px; border-radius: 5px; cursor: pointer;">
                <span>Upload Admin Endorsement</span>
                <input type="file" id="admin_endorsement" name="admin_endorsement" accept=".pdf" style="display: none;">
            </label><br><br>
            @endif


            <label for="advisersInfoText">
                <h2>Edit Advisers and Officers Information:</h2>
            </label>
            
            <div id="listOfOfficersContent" class="card mt-4 mb-4" style="height: auto;">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;" ><h3>Adviser:</h3></label>
                                    <label for="janeName" style="text-align:left;">Name:</label>
                                    <input type="text" id="adviser_name" name="adviser_name" placeholder="{{$org->adviser_name}}" value="{{$org->adviser_name}}"><br>
                                    <label for="janeContact" style="text-align:left;">Email:</label>
                                    <input type="text" id="adviser_name" name="adviser_email" placeholder="{{$org->adviser_email}}" value="{{$org->adviser_email}}"><br>
                            </div>
                        </div>
                    </div>
                    <br><br>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h3>AUSG Representative:</h3></label>
                                    <label for="ausg_rep_studno" style="text-align:left;">Student No:</label>
                                    <input type="text" id="ausg_rep_studno" name="ausg_rep_studno" maxlength="9"placeholder="{{$org->ausg_rep_studno}}" value="{{$org->ausg_rep_studno}}"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="ausg_rep_name" name="ausg_rep_name" placeholder="{{$org->ausg_rep_name}}" value="{{$org->ausg_rep_name}}"><br>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h3>President:</h3></label>
                                    <label for="president_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="president_studno" name="president_studno" maxlength="9"placeholder="{{$org->president_studno}}" value="{{$org->president_studno}}"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="president_name" name="president_name" placeholder="{{$org->president_name}}" value="{{$org->president_name}}"><br>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h3>Vp Internal:</h3></label>
                                    <label for="vp_internal_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="vp_internal_studno" name="vp_internal_studno" maxlength="9" placeholder="{{$org->vp_internal_studno}}" value="{{$org->vp_internal_studno}}"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="vp_internal_name" name="vp_internal_name" placeholder="{{$org->vp_internal_name}}" value="{{$org->vp_internal_name}}"><br>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h3>Vp External:</h3></label>
                                    <label for="vp_external_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="vp_external_studno" name="vp_external_studno" maxlength="9" placeholder="{{$org->vp_external_studno}}" value="{{$org->vp_external_studno}}"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="vp_external_name" name="vp_external_name" placeholder="{{$org->vp_external_name}}" value="{{$org->vp_external_name}}"><br>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h3>Secretary:</h3></label>
                                    <label for="secretary_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="secretary_studno" name="secretary_studno" maxlength="9" placeholder="{{$org->secretary_studno}}" value="{{$org->secretary_studno}}"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="secretary_name" name="secretary_name" placeholder="{{$org->secretary_name}}" value="{{$org->secretary_name}}"><br>
                            </div>
                        </div>
                        <br><br>

                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h3>Treasurer:</h3></label>
                                    <label for="treasurer_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="treasurer_studno" name="treasurer_studno" maxlength="9" placeholder="{{$org->treasurer_studno}}" value="{{$org->treasurer_studno}}"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="treasurer_name" name="treasurer_name" placeholder="{{$org->treasurer_name}}" value="{{$org->treasurer_name}}"><br>
                            </div>
                        </div>
                        <br><br>

                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h3>Auditor:</h3></label>
                                    <label for="auditor_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="auditor_studno" name="auditor_studno" maxlength="9" placeholder="{{$org->auditor_studno}}" value="{{$org->auditor_studno}}"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="auditor_name" name="auditor_name" placeholder="{{$org->auditor_name}}" value="{{$org->auditor_name}}"><br>
                            </div>
                        </div>
                        <br><br>

                        <div class="col-md-15">
                            <div class="officer-card">
                                    <label for="janePosition" style="text-align:left;"><h3>PRO:</h3></label>
                                    <label for="pro_studno" style="text-align:left;">Student No:</label>
                                    <input type="number" id="pro_studno" name="pro_studno" maxlength="9" placeholder="{{$org->pro_studno}}" value="{{$org->pro_studno}}"><br>
                                    <label for="janeContact" style="text-align:left;">Name:</label>
                                    <input type="text" id="pro_name" name="pro_name" placeholder="{{$org->pro_name}}" value="{{$org->pro_name}}"><br>
                            </div>
                        </div>
                        <br><br>
                        <button type="submit" name="edited" value="{{$org->id}}" style="background-color: #007bff; color: #fff; margin-right:550px; margin-bottom: 10px;padding: 10px 15px; border-radius: 5px; cursor: pointer;">Save</button><br>
                        <button href="/osaemp/organization_list" style="background-color: #7e7e7e; color: #fff; padding: 10px 15px; border-radius: 5px; cursor: pointer;margin-right:550px;">Cancel</button>
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