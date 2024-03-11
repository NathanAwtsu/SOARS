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

    public function new_org(){
        $organizationAcademic = DB::table('organizations')->where('type_of_organization','=','Academic')->where('requirement_status','=','complete')->get();
        $organizationCoAcademic = DB::table('organizations')->where('type_of_organization','=','Co-Academic')->where('requirement_status','=','complete')->get();
        $organizationSocioCivic = DB::table('organizations')->where('type_of_organization','=','Socio Civic')->where('requirement_status','=','complete')->get();
        $organizationReligious = DB::table('organizations')->where('type_of_organization','=','Religious')->where('requirement_status','=','complete')->get();
        $pendings = DB::table('organizations')->where('requirement_status','!=','Complete')->get();
        
        return view('student_orgs.rso_list')
        ->with('organizationAcademic', $organizationAcademic)
        ->with('organizationCoAcademic', $organizationCoAcademic)
        ->with('organizationSocioCivic', $organizationSocioCivic)
        ->with('organizationReligious', $organizationReligious)
        ->with('pendings', $pendings);
        
    }

    public function organization_page(Request $request){
    
        $id = $request->route('id');
        $org = Organization::find($id);
	    return view('OSA.organization_page')->with('org',$org);

    }

    public function rso_page($id)
    {
        $orgId = $id;
        $org = DB::table('organizations')->where('id', '=', $orgId)->get();
        return view('Admin.rso_page')->with('org', $org);
    }

    public function newOrganization(Request $request){

        $fieldsToCheckForNull = [
            'name',
            'nickname',
            'type_of_organization',
            'mission',
            'vision',
            'org_email',
            'org_fb',
            'adviser_name',
            'adviser_email',
            'ausg_rep_studno',
            'ausg_rep_name',
            'ausg_rep_email',
            'president_studno',
            'president_name',
            'president_email',
            'vp_internal_studno',
            'vp_internal_name',
            'vp_internal_email',
            'vp_external_studno',
            'vp_external_name',
            'vp_external_email',
            'secretary_studno',
            'secretary_name',
            'secretary_email',
            'treasurer_studno',
            'treasurer_name',
            'treasurer_email',
            'auditor_studno',
            'auditor_name',
            'auditor_email',
            'pro_studno',
            'pro_name',
            'pro_email'
        ];
    
        $nullCount = 41;
    
        foreach ($fieldsToCheckForNull as $fieldName) {
            if (request($fieldName) === null) {
                $nullCount--;
            }
        }
    
        $total = ($nullCount / 41) * 100;
    
        $logoPath = $this->handleFileUpload($request, 'logo', 'storage/logo/');
        $constiPath = $this->handleFileUpload($request, 'consti_and_byLaws', 'storage/consti_and_byLaws/');
        $letterPath = $this->handleFileUpload($request, 'letter_of_intent', 'storage/letter_of_intent/');
        $adminEndorsementPath = $this->handleFileUpload($request, 'admin_endorsement', 'storage/admin_endorsement/');
        $adviserPath = $this->handleFileUpload($request, 'adviser_photo', 'storage/organization_officer_photo/adviser_photo/');
        $ausgRepPath = $this->handleFileUpload($request, 'ausg_rep_photo', 'storage/organization_officer_photo/ausg_rep_photo/');
        $presidentPath = $this->handleFileUpload($request, 'president_photo', 'storage/organization_officer_photo/president_photo/');
        $vpIntPath = $this->handleFileUpload($request, 'vp_internal_photo', 'storage/organization_officer_photo/vp_internal_photo/');
        $vpExtPath = $this->handleFileUpload($request, 'vp_external_photo', 'storage/organization_officer_photo/vp_external_photo/');
        $secretaryPath = $this->handleFileUpload($request, 'secretary_photo', 'storage/organization_officer_photo/secretary_photo/');
        $treasurerPath = $this->handleFileUpload($request, 'treasurer_photo', 'storage/organization_officer_photo/treasurer_photo/');
        $auditorPath = $this->handleFileUpload($request, 'auditor_photo', 'storage/organization_officer_photo/auditor_photo/');
        $proPath = $this->handleFileUpload($request, 'pro_photo', 'storage/organization_officer_photo/pro_photo/');
    
        $organizationData = [
            'requirement_status' => $total,
            'name' => request('name'),
            'nickname' => request('nickname'),
            'type_of_organization' => request('type_of_organization'),
            'mission' => request('mission'),
            'vision' => request('vision'),
            'org_email' => request('org_email'),
            'org_fb' => request('org_fb'),
            'logo' => $logoPath,
            'consti_and_byLaws' => $constiPath,
            'letter_of_intent' => $letterPath,
            'admin_endorsement' => $adminEndorsementPath,
            'adviser_name' => request('adviser_name'),
            'adviser_photo' => $adviserPath,
            'adviser_email' => request('adviser_email'),
            'ausg_rep_studno' => request('ausg_rep_studno'),
            'ausg_rep_photo' => $ausgRepPath,
            'ausg_rep_name' => request('ausg_rep_name'),
            'ausg_rep_email' => request('ausg_rep_email'),
            'president_studno' => request('president_studno'),
            'president_photo' => $presidentPath,
            'president_name' => request('president_name'),
            'president_email' => request('president_email'),
            'vp_internal_studno' => request('vp_internal_studno'),
            'vp_internal_photo' => $vpIntPath,
            'vp_internal_name' => request('vp_internal_name'),
            'vp_internal_email' => request('vp_internal_email'),
            'vp_external_studno' => request('vp_external_studno'),
            'vp_external_photo' => $vpExtPath,
            'vp_external_name' => request('vp_external_name'),
            'vp_external_email' => request('vp_external_email'),
            'secretary_studno' => request('secretary_studno'),
            'secretary_photo' => $secretaryPath,
            'secretary_name' => request('secretary_name'),
            'secretary_email' => request('secretary_email'),
            'treasurer_studno' => request('treasurer_studno'),
            'treasurer_photo' => $treasurerPath,
            'treasurer_name' => request('treasurer_name'),
            'treasurer_email' => request('treasurer_email'),
            'auditor_studno' => request('auditor_studno'),
            'auditor_photo' => $auditorPath,
            'auditor_name' => request('auditor_name'),
            'auditor_email' => request('auditor_email'),
            'pro_studno' => request('pro_studno'),
            'pro_photo' => $proPath,
            'pro_name' => request('pro_name'),
            'pro_email' => request('pro_email'),
        ];
    
        Organization::create($organizationData);
    
        return redirect('/osaemp/organization_list')
            ->with('success', 'You have started to create a New Organization');
    }
    
    private function handleFileUpload($request, $fileField, $directory)
    {
        $filePath = null;
    
        if ($request->hasFile($fileField)) {
            $file = $request->file($fileField);
            $fileName = $fileField . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($directory), $fileName);
            $filePath = $fileName;
        }
    
        return $filePath;
    }
    

    public function org_pending_edit_view(Request $request, $id){
        
        $id = $request->route('id');
        $org = Organization::find($id);
	    return view('OSA.organization_pending_edit')->with('org',$org);
        
    }

    public function org_pending(Request $request){
        
        $id = $request->route('id');
        $org = Organization::find($id);
	    return view('Admin.org_pending')->with('org',$org);
        
    }
    
    public function org_pending_edit_save(Request $request, $id)
    {
        if ($request->has('edited') ) {
            $orgId = $id;
            $org = Organization::findOrFail($orgId);
            if($org->requirement_status != 'complete'){
                $fieldsToCheckForNull = [
                    'name', 'nickname', 'type_of_organization', 'mission', 'vision', 'org_email', 'org_fb',
                    'adviser_name', 'adviser_email', 'ausg_rep_studno', 'ausg_rep_name', 'ausg_rep_email',
                    'president_studno', 'president_name', 'president_email', 'vp_internal_studno', 'vp_internal_name',
                    'vp_internal_email', 'vp_external_studno', 'vp_external_name', 'vp_external_email', 'secretary_studno',
                    'secretary_name', 'secretary_email', 'treasurer_studno', 'treasurer_name', 'treasurer_email',
                    'auditor_studno', 'auditor_name', 'auditor_email', 'pro_studno', 'pro_name', 'pro_email'
                ];

                // Count the total number of fields to be checked
                $totalFields = count($fieldsToCheckForNull);

                // Initialize the null count
                $nullCount = 0;

                foreach ($fieldsToCheckForNull as $fieldName) {
                    // Check if the field exists in the request
                    if ($request->has($fieldName)) {
                        // Increment the null count if the field is null
                        if (is_null(request($fieldName))) {
                            $nullCount++;
                        }
                    } else {
                        // If the field doesn't exist in the request, consider it null
                        $nullCount++;
                    }
                }

                // Calculate the percentage completion
                $percentage = (($totalFields - $nullCount) / $totalFields) * 100;


                // Handle file uploads
                $imageFields = [
                    'logo' => 'storage/logo/',
                    'consti_and_byLaws' => 'storage/consti_and_byLaws/',
                    'letter_of_intent' => 'storage/letter_of_intent/',
                    'admin_endorsement' => 'storage/admin_endorsement/',
                    'adviser_photo' => 'storage/organization_officer_photo/adviser_photo/',
                    'ausg_rep_photo' => 'storage/organization_officer_photo/ausg_rep_photo/',
                    'president_photo' => 'storage/organization_officer_photo/president_photo/',
                    'vp_internal_photo' => 'storage/organization_officer_photo/vp_internal_photo/',
                    'vp_external_photo' => 'storage/organization_officer_photo/vp_external_photo/',
                    'secretary_photo' => 'storage/organization_officer_photo/secretary_photo/',
                    'treasurer_photo' => 'storage/organization_officer_photo/treasurer_photo/',
                    'auditor_photo' => 'storage/organization_officer_photo/auditor_photo/',
                    'pro_photo' => 'storage/organization_officer_photo/pro_photo/',
                ];

                foreach ($imageFields as $field => $directory) {
                    if ($request->hasFile($field)) {
                        if ($org->$field) {
                            $oldFilePath = public_path($directory . $org->$field);
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }
                        $file = $request->file($field);
                        $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path($directory), $fileName);
                        $org->$field = $fileName;
                    } elseif (is_null($org->$field)) {
                        $org->$field = null;
                        $percentage -= 1;
                    }
                }

                $org->name = $request->input('name');
                $org->nickname = $request->input('nickname');
                $org->type_of_organization = $request->input('type_of_organization');
                $org->mission = $request->input('mission');
                $org->vision = $request->input('vision');
                $org->org_email = $request->input('org_email');
                $org->org_fb = $request->input('org_fb');
                $org->adviser_name = $request->input('adviser_name');
                $org->adviser_email = $request->input('adviser_email');
                $org->ausg_rep_studno = $request->input('ausg_rep_studno');
                $org->ausg_rep_name = $request->input('ausg_rep_name');
                $org->ausg_rep_email = $request->input('ausg_rep_email');
                //President
                $org->president_studno = $request->input('president_studno');
                $org->president_name = $request->input('president_name');
                $org->president_email = $request->input('president_email');
                //VPI
                $org->vp_internal_studno = $request->input('vp_internal_studno');
                $org->vp_internal_name = $request->input('vp_internal_name');
                $org->vp_internal_email = $request->input('vp_internal_email');
                //VPE
                $org->vp_external_studno = $request->input('vp_external_studno');
                $org->vp_external_name = $request->input('vp_external_name');
                $org->vp_external_email = $request->input('vp_external_email');
                //Sec
                $org->secretary_studno = $request->input('secretary_studno');
                $org->secretary_name = $request->input('secretary_name');
                $org->secretary_email = $request->input('secretary_email');
                //Tres
                $org->treasurer_studno = $request->input('treasurer_studno');
                $org->treasurer_name = $request->input('treasurer_name');
                $org->treasurer_email = $request->input('treasurer_email');
                //Audit
                $org->auditor_studno = $request->input('auditor_studno');
                $org->auditor_name = $request->input('auditor_name');
                $org->auditor_email = $request->input('auditor_email');
                //PRO
                $org->pro_studno = $request->input('pro_studno');
                $org->pro_name = $request->input('pro_name');
                $org->pro_email = $request->input('pro_email');
                // Save the changes to the organization
                $org->save();

                return redirect('/osaemp/organization_list')->with('success', 'You have updated ' . $org->name);
            }


            if($org->requirement_status == 'complete'){

                // Handle file uploads
                $imageFields = [
                    'logo' => 'storage/logo/',
                    'consti_and_byLaws' => 'storage/consti_and_byLaws/',
                    'letter_of_intent' => 'storage/letter_of_intent/',
                    'admin_endorsement' => 'storage/admin_endorsement/',
                    'adviser_photo' => 'storage/organization_officer_photo/adviser_photo/',
                    'ausg_rep_photo' => 'storage/organization_officer_photo/ausg_rep_photo/',
                    'president_photo' => 'storage/organization_officer_photo/president_photo/',
                    'vp_internal_photo' => 'storage/organization_officer_photo/vp_internal_photo/',
                    'vp_external_photo' => 'storage/organization_officer_photo/vp_external_photo/',
                    'secretary_photo' => 'storage/organization_officer_photo/secretary_photo/',
                    'treasurer_photo' => 'storage/organization_officer_photo/treasurer_photo/',
                    'auditor_photo' => 'storage/organization_officer_photo/auditor_photo/',
                    'pro_photo' => 'storage/organization_officer_photo/pro_photo/',
                ];

                foreach ($imageFields as $field => $directory) {
                    if ($request->hasFile($field)) {
                        if ($org->$field) {
                            $oldFilePath = public_path($directory . $org->$field);
                            if (file_exists($oldFilePath)) {
                                unlink($oldFilePath);
                            }
                        }
                        $file = $request->file($field);
                        $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                        $file->move(public_path($directory), $fileName);
                        $org->$field = $fileName;
                    } elseif (is_null($org->$field)) {
                        $org->$field = null;
                        $percentage -= 1;
                    }
                }

                $org->name = $request->input('name');
                $org->nickname = $request->input('nickname');
                $org->type_of_organization = $request->input('type_of_organization');
                $org->mission = $request->input('mission');
                $org->vision = $request->input('vision');
                $org->org_email = $request->input('org_email');
                $org->org_fb = $request->input('org_fb');
                $org->adviser_name = $request->input('adviser_name');
                $org->adviser_email = $request->input('adviser_email');
                $org->ausg_rep_studno = $request->input('ausg_rep_studno');
                $org->ausg_rep_name = $request->input('ausg_rep_name');
                $org->ausg_rep_email = $request->input('ausg_rep_email');
                //President
                $org->president_studno = $request->input('president_studno');
                $org->president_name = $request->input('president_name');
                $org->president_email = $request->input('president_email');
                //VPI
                $org->vp_internal_studno = $request->input('vp_internal_studno');
                $org->vp_internal_name = $request->input('vp_internal_name');
                $org->vp_internal_email = $request->input('vp_internal_email');
                //VPE
                $org->vp_external_studno = $request->input('vp_external_studno');
                $org->vp_external_name = $request->input('vp_external_name');
                $org->vp_external_email = $request->input('vp_external_email');
                //Sec
                $org->secretary_studno = $request->input('secretary_studno');
                $org->secretary_name = $request->input('secretary_name');
                $org->secretary_email = $request->input('secretary_email');
                //Tres
                $org->treasurer_studno = $request->input('treasurer_studno');
                $org->treasurer_name = $request->input('treasurer_name');
                $org->treasurer_email = $request->input('treasurer_email');
                //Audit
                $org->auditor_studno = $request->input('auditor_studno');
                $org->auditor_name = $request->input('auditor_name');
                $org->auditor_email = $request->input('auditor_email');
                //PRO
                $org->pro_studno = $request->input('pro_studno');
                $org->pro_name = $request->input('pro_name');
                $org->pro_email = $request->input('pro_email');
                // Save the changes to the organization
                $org->save();

                return redirect('/osaemp/organization_list/organization_page/'.$org->id)->with('success', 'You have updated ' . $org->name);

            }
        }

        if ($request->has('cancel')){
            $orgId = $id;
            $org = Organization::findOrFail($orgId);
            return redirect('/osaemp/organization_list');

        }

        if ($request->has('org_page')){
            $orgId = $id;
            $org = Organization::findOrFail($orgId);
            return redirect('/osaemp/organization_list/organization_page/'.$orgId);

        }

        if ($request->has('complete')) {
            $orgId = $id;
            $org = Organization::findOrFail($orgId);
            $org->update([
                'requirement_status' => 'complete'
            ]);
            return redirect('/osaemp/organization_list')->with('success', 'You have completed the requirements for ' . $org->name);
        }
    }

    public function org_pending_save(Request $request, $id)
    {
        if ($request->has('edited')) {
            $orgId = $id;
            $org = Organization::findOrFail($orgId);

            $fieldsToCheckForNull = [
                'name', 'nickname', 'type_of_organization', 'mission', 'vision', 'org_email', 'org_fb',
                'adviser_name', 'adviser_email', 'ausg_rep_studno', 'ausg_rep_name', 'ausg_rep_email',
                'president_studno', 'president_name', 'president_email', 'vp_internal_studno', 'vp_internal_name',
                'vp_internal_email', 'vp_external_studno', 'vp_external_name', 'vp_external_email', 'secretary_studno',
                'secretary_name', 'secretary_email', 'treasurer_studno', 'treasurer_name', 'treasurer_email',
                'auditor_studno', 'auditor_name', 'auditor_email', 'pro_studno', 'pro_name', 'pro_email'
            ];

            // Count the total number of fields to be checked
            $totalFields = count($fieldsToCheckForNull);

            // Initialize the null count
            $nullCount = 0;

            foreach ($fieldsToCheckForNull as $fieldName) {
                // Check if the field exists in the request
                if ($request->has($fieldName)) {
                    // Increment the null count if the field is null
                    if (is_null(request($fieldName))) {
                        $nullCount++;
                    }
                } else {
                    // If the field doesn't exist in the request, consider it null
                    $nullCount++;
                }
            }

            // Calculate the percentage completion
            $percentage = (($totalFields - $nullCount) / $totalFields) * 100;


            // Handle file uploads
            $imageFields = [
                'logo' => 'storage/logo/',
                'consti_and_byLaws' => 'storage/consti_and_byLaws/',
                'letter_of_intent' => 'storage/letter_of_intent/',
                'admin_endorsement' => 'storage/admin_endorsement/',
                'adviser_photo' => 'storage/organization_officer_photo/adviser_photo/',
                'ausg_rep_photo' => 'storage/organization_officer_photo/ausg_rep_photo/',
                'president_photo' => 'storage/organization_officer_photo/president_photo/',
                'vp_internal_photo' => 'storage/organization_officer_photo/vp_internal_photo/',
                'vp_external_photo' => 'storage/organization_officer_photo/vp_external_photo/',
                'secretary_photo' => 'storage/organization_officer_photo/secretary_photo/',
                'treasurer_photo' => 'storage/organization_officer_photo/treasurer_photo/',
                'auditor_photo' => 'storage/organization_officer_photo/auditor_photo/',
                'pro_photo' => 'storage/organization_officer_photo/pro_photo/',
            ];

            foreach ($imageFields as $field => $directory) {
                if ($request->hasFile($field)) {
                    $file = $request->file($field);
                    $fileName = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path($directory), $fileName);
                    $org->$field = $fileName;
                } elseif (is_null($org->$field)) {
                    $org->$field = null;
                    $percentage -= 1;
                }
            }

            $org->requirement_status = $percentage;
            $org->name = $request->input('name');
            $org->nickname = $request->input('nickname');
            $org->type_of_organization = $request->input('type_of_organization');
            $org->mission = $request->input('mission');
            $org->vision = $request->input('vision');
            $org->org_email = $request->input('org_email');
            $org->org_fb = $request->input('org_fb');
            $org->adviser_name = $request->input('adviser_name');
            $org->adviser_email = $request->input('adviser_email');
            // Continue updating other fields...

            // Save the changes to the organization
            $org->save();

            return redirect('/rso_list')->with('success', 'You have updated ' . $org->name);
        }

        if ($request->has('complete')) {
            $orgId = $id;
            $org = Organization::findOrFail($orgId);
            $org->update([
                'requirement_status' => 'complete'
            ]);

            return redirect('/rso_list')->with('success', 'You have completed the requirements for ' . $org->name);
        }
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