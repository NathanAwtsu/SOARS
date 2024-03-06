<?php

namespace App\Http\Controllers;


use App\Events\ChatifyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Event;
use App\Models\Organization;
use Datatables;

class OrganizationController extends Controller
{
    
    public function organization(){
        $organizationAcademic = DB::table('organizations')->where('type_of_organization','=','Academic')->where('requirement_status','=','complete')->get();
        $organizationCoAcademic = DB::table('organizations')->where('type_of_organization','=','Co-Academic')->where('requirement_status','=','complete')->get();
        $organizationSocioCivic = DB::table('organizations')->where('type_of_organization','=','Socio Civic')->where('requirement_status','=','complete')->get();
        $organizationReligious = DB::table('organizations')->where('type_of_organization','=','Religious')->where('requirement_status','=','complete')->get();
        $pendings = DB::table('organizations')->where('requirement_status','!=','Complete')->get();
        
        return view('OSA.organization_list')
        ->with('organizationAcademic', $organizationAcademic)
        ->with('organizationCoAcademic', $organizationCoAcademic)
        ->with('organizationSocioCivic', $organizationSocioCivic)
        ->with('organizationReligious', $organizationReligious)
        ->with('pendings', $pendings);
        

    }

    public function newOrganization(Request $request){

        $fieldsToCheckForNull= [
            'name',
            'nickname',
            'type_of_organization',
            'mission',
            'vision',
            'logo',
            'consti_and_byLaws',
            'letter_of_intent',
            'adviser_name',
            'adviser_email',
            'ausg_rep_studno',
            'ausg_rep_name',
            'president_studno',
            'president_name',
            'vp_internal_studno',
            'vp_internal_name',
            'vp_external_studno',
            'vp_external_name',
            'secretary_studno',
            'secretary_name',
            'treasurer_studno',
            'treasurer_name',
            'auditor_studno',
            'auditor_name',
            'pro_studno',
            'pro_name',
            'admin_endorsement'
            ];
            
            $nullCount = 27;
    
            foreach ($fieldsToCheckForNull as $fieldName) {
                
                if (request($fieldName) === null) {
                    $nullCount--;
                }
                
            }

            $total=($nullCount/29)*100;


            //File Validation
            $constiPath = null;
            if ($request->hasFile('consti_and_byLaws')) {
                    
                $consti = $request->file('consti_and_byLaws'); //Retrieve the uploaded file

                //Generate a unique filename for the consti
                $constiFile = 'cab_'.time().'.'. $consti->getClientOriginalExtension();

                //Move the uploaded file to the public directory
                $consti->move(public_path('storage/consti_and_byLaws/'), $constiFile);


                //Set the path to the uploaded pdf
                $constiPath = $constiFile;
            }
            
            $logoPath = null;
            if ($request->hasFile('logo')) {
                
                $logo = $request->file('logo'); // Retrieve the uploaded file

                // Generate a unique filename for the image
                $fileName = 'image_' . time() . '.' . $logo->getClientOriginalExtension();

                // Move the uploaded file to the public directory
                $logo->move(public_path('storage/logo/'), $fileName);

                // Set the path to the uploaded image
                $logoPath = $fileName;
            }

            $letterPath = null;
            if ($request->hasFile('letter_of_intent')) {
                
                /*$letterPath = $request->file('letter_of_intent')->
                storePubliclyAs('letter_of_intent', 'letter_' . time() . '.' . 
                $request->file('letter_of_intent')->extension(), 'public');
                */

                $letter = $request->file('letter_of_intent'); //Retrive the Uploaded File

                //Generate a unique filename for the letter
                $loiFile = 'loi_'.time().'.'. $letter->getClientOriginalExtension();

                //Move the uploaded file to the public directory
                $letter->move(public_path('storage/letter_of_intent/'), $loiFile);


                //Set the path to the uploaded pdf
                $letterPath = $loiFile;
            }
            

            $adminEndorsementPath = null;
            if ($request->hasFile('admin_endorsement')) {
                $admin = $request->file('admin_endorsement');
                $aeFile = 'ae_' . time() . '.' . $admin->getClientOriginalExtension();
                $admin->move(public_path('storage/admin_endorsement/'), $aeFile);
                $adminEndorsementPath = $aeFile;
            }
                        
        Organization::create([
            'id'=> request('id'),
            'requirement_status'=> $total,
            'name'=> request('name'),
            'nickname'=>request('nickname'),
            'type_of_organization'=>request('type_of_organization'),
            'mission'=>request('mission'),
            'vision'=>request('vision'),
            'logo'=>$logoPath,
            'consti_and_byLaws'=>$constiPath,
            'letter_of_intent'=>$letterPath,
            //Adviser
            'adviser_name'=>request('adviser_name'),
            'adviser_email'=>request('adviser_email'),
            //AUSG
            'ausg_rep_studno'=>request('ausg_rep_studno'),
            'ausg_rep_name'=>request('ausg_rep_name'),
            //President
            'president_studno'=>request('president_studno'),
            'president_name'=>request('president_name'),
            //VP Internal
            'vp_internal_studno'=>request('vp_internal_studno'),
            'vp_internal_name'=>request('vp_internal_name'),
            //VPexternal
            'vp_external_studno'=>request('vp_external_studno'),
            'vp_external_name'=>request('vp_external_name'),
            //Secretary
            'secretary_studno'=>request('secretary_studno'),
            'secretary_name'=>request('secretary_name'),
            //Treasurer
            'treasurer_studno'=>request('treasurer_studno'),
            'treasurer_name'=>request('treasurer_name'),
            //Auditor
            'auditor_studno'=>request('auditor_studno'),
            'auditor_name'=>request('auditor_name'),
            //PRO
            'pro_studno'=>request('pro_studno'),
            'pro_name'=>request('pro_name'),
            //admin_endorsement
            'admin_endorsement' => $adminEndorsementPath,
        ]);
        return redirect('/osaemp/organization_list')
        ->with('success', 'You have started to create a New Organization');

    }

    public function org_pending_edit_view(Request $request){
        
        $id = $request->route('id');
        $org = Organization::find($id);
	    return view('OSA.organization_pending_edit')->with('org',$org);
        
    }
    
    public function org_pending_edit_save(Request $request, $id){
        if($request->has('edited')){
            $orgId = $id;

            $fieldsToCheckForNull= [
                'name',
                'nickname',
                'type_of_organization',
                'mission',
                'vision',
                'adviser_name',
                'adviser_email',
                'ausg_rep_studno',
                'ausg_rep_name',
                'president_studno',
                'president_name',
                'vp_internal_studno',
                'vp_internal_name',
                'vp_external_studno',
                'vp_external_name',
                'secretary_studno',
                'secretary_name',
                'treasurer_studno',
                'treasurer_name',
                'auditor_studno',
                'auditor_name',
                'pro_studno',
                'pro_name'
                ];
                
            $nullCount = 27;
    
            foreach ($fieldsToCheckForNull as $fieldName) {
                
                if (request($fieldName) === null) {
                    $nullCount--;
                }
                
            }
            $total=($nullCount/27)*100;
    
            
            $org = Organization::findOrFail($orgId);

            $constiPath = $org->consti_and_byLaws;
            if ($request->hasFile('consti_and_byLaws')) {
                    
                $consti = $request->file('consti_and_byLaws'); //Retrieve the uploaded file

                //Generate a unique filename for the consti
                $constiFile = 'cab_'.time().'.'. $consti->getClientOriginalExtension();

                //Move the uploaded file to the public directory
                $consti->move(public_path('storage/consti_and_byLaws/'), $constiFile);


                //Set the path to the uploaded pdf
                $constiPath = $constiFile;
            }
            if($org->consti_and_byLaws == null){
                $constiPath == null;
                $CPath = $total-1;
            }
            
            $logoPath = $org->logo;
            if ($request->hasFile('logo')) {
                
                $logo = $request->file('logo'); // Retrieve the uploaded file

                // Generate a unique filename for the image
                $fileName = 'image_' . time() . '.' . $logo->getClientOriginalExtension();

                // Move the uploaded file to the public directory
                $logo->move(public_path('storage/logo/'), $fileName);

                // Set the path to the uploaded image
                $logoPath = $fileName;
            }
            if($org->logo == null){
                $logoPath ==null;
                $LPath = $total-1;
            }

            $letterPath = $org->letter_of_intent;
            if ($request->hasFile('letter_of_intent')) {
                
                /*$letterPath = $request->file('letter_of_intent')->
                storePubliclyAs('letter_of_intent', 'letter_' . time() . '.' . 
                $request->file('letter_of_intent')->extension(), 'public');
                */

                $letter = $request->file('letter_of_intent'); //Retrive the Uploaded File

                //Generate a unique filename for the letter
                $loiFile = 'loi_'.time().'.'. $letter->getClientOriginalExtension();

                //Move the uploaded file to the public directory
                $letter->move(public_path('storage/letter_of_intent/'), $loiFile);


                //Set the path to the uploaded pdf
                $letterPath = $loiFile;
            }
            if($org->letter_of_intent == null){
                $letterPath == null;
                $LETPath = $total-1;
            }
            

            $adminEndorsementPath = $org->admin_endorsement;
            if ($request->hasFile('admin_endorsement')) {
                $admin = $request->file('admin_endorsement');
                $aeFile = 'ae_' . time() . '.' . $admin->getClientOriginalExtension();
                $admin->move(public_path('storage/admin_endorsement/'), $aeFile);
                $adminEndorsementPath = $aeFile;
            }

            if($org->admin_endorsement == null){
                $adminEndorsementPath == null;
                $AEPath = $total-1;
            }

            $percentage = $total;

            $org->update([
            'requirement_status'=> $percentage,
            'name' => request('name'),
            'nickname' => request('nickname'),
            'type_of_organization' => request('type_of_organization'),
            'mission' => request('mission'),
            'vision' => request('vision'),
            'logo' => $logoPath,
            'consti_and_byLaws' => $constiPath,
            'letter_of_intent' => $letterPath,
            'adviser_name' => request('adviser_name'),
            'adviser_email' => request('adviser_email'),
            'ausg_rep_studno' => request('ausg_rep_studno'),
            'ausg_rep_name' => request('ausg_rep_name'),
            'president_studno' => request('president_studno'),
            'president_name' => request('president_name'),
            'vp_internal_studno' => request('vp_internal_studno'),
            'vp_internal_name' => request('vp_internal_name'),
            'vp_external_studno' => request('vp_external_studno'),
            'vp_external_name' => request('vp_external_name'),
            'secretary_studno' => request('secretary_studno'),
            'secretary_name' => request('secretary_name'),
            'treasurer_studno' => request('treasurer_studno'),
            'treasurer_name' => request('treasurer_name'),
            'auditor_studno' => request('auditor_studno'),
            'auditor_name' => request('auditor_name'),
            'pro_studno' => request('pro_studno'),
            'pro_name' => request('pro_name'),
            'admin_endorsement' => $adminEndorsementPath,
            ]);

            return redirect('/osaemp/organization_list')
            ->with('success', 'You have update '.$org->name);
        }

        if($request->has('complete')){
            $orgId = $id;
            $org = Organization::findOrFail($orgId);
            $org->update([
                'requirement_status' => 'complete',]);

            return redirect('/osaemp/organization_list')
            ->with('success', 'You have completed the requirements for'. $org->name);

        }

        ;
    }

    public function org_pending_delete($id)
{
    $organization = Organization::find($id);

    if (!$organization) {
        // If organization not found, return an error response
        return response()->json(['error' => 'Organization not found'], 404);
    }
    // Delete the organization
    $organization->delete();

    // Redirect back with a success message
    return redirect('/osaemp/organization_activation')->with('success', 'Organization deleted successfully');
}
}
