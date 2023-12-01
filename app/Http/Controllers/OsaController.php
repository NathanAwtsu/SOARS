<?php

namespace App\Http\Controllers;


use App\Events\ChatifyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;
use App\Models\Organization;
use Illuminate\Support\Facades\DB;

class OsaController extends Controller
{
    public function index(){

        

        return view('osaemp', ['users'=>$user, 'unseenCounter'=> $unseenCounter]);
    }

    

    public function store(){
        
        
        Event::create([
        
        'id'=> request('id'),
        'status' => request('status'),
        'requirement' => request('requirement'),
        'organization_name' => request('organization_name'),
        'activity_title' => request('activity_title'),
        'type_of_activity' => request('type_of_activity'),
        'activity_start_date' => request('activity_start_date'),
        'activity_end_date' => request('activity_end_date'),
        'activity_start_time' => request('activity_start_time'),
        'activity_end_time' => request('activity_end_time'),
        'venue' => request('venue'),
        'participants'=> request('participants'),
        'partner_organization'=> request('partner_organization'),
        'organization_fund'=> request('organization_fund'),
        'solidarity_share'=> request('solidarity_share'),
        'registration_fee'=> request('registration_fee'),
        'AUSG_subsidy'=> request('AUSG_subsidy'),
        'sponsored_by'=> request('sponsored_by'),
        'ticket_selling'=> request('ticket_selling'),
        'ticket_control_number'=> request('ticket_control_number'),
        'other_source_of_fund'=> request('other_source_of_fund')
        ]);
        

        return redirect('/osaemp/activity_approval');

    }

    public function retrieve(){
        $activity = DB::select('select * from events');
        return view('OSA.approval', ['activity'=> $activity]);

    }

    public function totalDashboard(){
        
        $totalEvent = DB::table('events')->get();
        $totalMember = DB::table('students')->get();
        $totalOrg= DB::table('organizations')->get();
        return view('osaemp')
        ->with('totalEvent', $totalEvent)
        ->with('totalMember',$totalMember)
        ->with('totalOrg', $totalOrg);
        
    }

    public function organization(){
        $organizationAcademic = DB::table('organizations')->where('type_of_organization','=','Academic')->get();
        $organizationCoAcademic = DB::table('organizations')->where('type_of_organization','=','Co-Academic')->get();
        $organizationSociocivic = DB::table('organizations')->where('type_of_organization','=','Sociocivic')->get();
        $organizationReligious = DB::table('organizations')->where('type_of_organization','=','Religious')->get();
    

        //ProgressBar

        $userID = DB::table('organizations')->wherenotnull('id');
        
        foreach($userID as $column=>$uid){
            $nulls=0;
            foreach($uid->id as $field){
            if($uid->id != null && $field[$column]){

            }
            }


            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->nickname == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->type_of_organization == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->mission == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->vision == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->logo == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->consti_and_bylaws == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->letter_of_intent == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            if ($uid->id != null && $uid->name == null){ 
                $nulls+=1;
            }
            
            /*
            .
            .
            */

            $percentage = ($nulls/27)*100;


        }
        

        return view('OSA.organization_list')
        ->with('organizationAcademic', $organizationAcademic)
        ->with('organizationCoAcademic', $organizationCoAcademic)
        ->with('organizationSociocivic', $organizationSociocivic)
        ->with('organizationReligious', $organizationReligious)
        ->with('percentage', $percentage);

    }

    public function newOrganization(){
        Organization::create([
            'id'=> request('id'),
            'requirement_status'=> request('requirement_status'),
            'name'=> request('name'),
            'nickname'=>request('nickname'),
            'type_of_organization'=>request(''),
            'mission'=>request('mission'),
            'vision'=>request('vision'),
            'logo'=>request('logo'),
            'consti_and_byLaws'=>request('consti_and_byLaws'),
            'letter_of_intent'=>request('letter_of_intent'),
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
            'admin_endorsement'=>request('admin_endorsement'),
        ]);
        return redirect('/osaemp/organization_list/new_organization');

    }
    
}
