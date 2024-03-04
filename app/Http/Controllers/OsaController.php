<?php

namespace App\Http\Controllers;


use App\Events\ChatifyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Event;
use App\Models\Organization;


class OsaController extends Controller
{
    public function index(){


        return view('osaemp', ['users'=>$user, 'unseenCounter'=> $unseenCounter]);
    }

    

    public function store(){

        
        
        DB::table('events')->insertgetId([
        'status'=>request('status'),
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

    public function  eventReport(){
        $activity = DB::table('events')->where('status','=','Approved')->get();
        return view('OSA.reports', ['activity'=> $activity]);
    }
    

    public function retrieve(){
        $activity = DB::table('events')->where('status','!=','Approved')->get();
        return view('OSA.approval', ['activity'=> $activity]);
    }


    public function totalDashboard(){
        
        $totalEvent = DB::table('events')->get();
        $totalMember = DB::table('students')->get();
        $totalOrg= DB::table('organizations')->get();
        $totalPendingOrg = DB::table('organizations')->where('requirement_status','!=','complete')->get();
        $activities = DB::table('events')->select('activity_title', 'activity_start_date', 'activity_end_date', 'activity_start_time', 'activity_end_time')->get();


        
        
        return view('OSA.dashboard')
        ->with('totalEvent', $totalEvent)
        ->with('totalMember',$totalMember)
        ->with('totalOrg', $totalOrg)
        ->with('totalPendingOrg', $totalPendingOrg)
        ->with('activities', $activities);
        
    }

    public function dashboard_Activities(){
        $approved = DB::table('events')->where('status','=','approved')->get();

        return view('OSA.activity')->with('approved',$approved);
    }

    public function approved(Request $request){
        $action = $request->input('action');

    // Extract event ID from the action (e.g., "approve_1" becomes "1")
    $eventId = substr($action, strpos($action, '_') + 1);

    $eventData = ['status' => 'Approved'];
    

    DB::table('events')->where('id', $eventId)->update($eventData);

    return redirect('/osaemp/activity_approval');


    }

    public function organization(){
        $organizationAcademic = DB::table('organizations')->where('type_of_organization','=','Academic')->where('requirement_status','=','complete')->get();
        $organizationCoAcademic = DB::table('organizations')->where('type_of_organization','=','Co-Academic')->where('requirement_status','=','complete')->get();
        $organizationSocioCivic = DB::table('organizations')->where('type_of_organization','=','Sociocivic')->where('requirement_status','=','complete')->get();
        $organizationReligious = DB::table('organizations')->where('type_of_organization','=','Religious')->where('requirement_status','=','complete')->get();
        $pendings = DB::table('organizations')->where('requirement_status','!=','Complete')->get();
        
        return view('OSA.organization_list')
        ->with('organizationAcademic', $organizationAcademic)
        ->with('organizationCoAcademic', $organizationCoAcademic)
        ->with('organizationSocioCivic', $organizationSocioCivic)
        ->with('organizationReligious', $organizationReligious)
        ->with('pendings', $pendings);
        

    }

    public function user(){
        $info=DB::table('users')->where('role','=','2')->where('role','=','3')->where('role','=','4')->get();
        return view('OSA.userlist')
        ->with('info', $info);

    }

    public function org_act_list(Request $request){
        $org_activation = DB::table('organizations')->get();
        return view('OSA.organization_activation')->with('org_activation', $org_activation);
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

            $total=($nullCount/27)*100;


            //File Validation
                $logoPath = null;
                if ($request->hasFile('logo')) {
                    /*$logoPath = $request->file('logo')->
                    storePubliclyAs('logo','image_'.time() . '.' . 
                    $request->file('logo')->extension(), 'public');
                     */

                    $logo = $request->file('logo'); // Retrieve the uploaded file

                    // Generate a unique filename for the image
                    $fileName = 'image_' . time() . '.' . $logo->getClientOriginalExtension();

                    // Move the uploaded file to the public directory
                    $logo->move(public_path('storage/logo'), $fileName);

                    // Set the path to the uploaded image
                    $logoPath = $fileName;
                }

                $constiPath = null;
                if ($request->hasFile('consti_and_byLaws')) {
                    /*$constiPath = $request->file('consti_and_byLaws')->
                    storePubliclyAs('consti_and_bylaws', 'consti_' . time() . '.' . 
                    $request->file('consti_and_byLaws')->extension(), 'public');*/

                    $consti = $request->file('consti_and_bylaws'); //Retrieve the uploaded file

                    //Generate a unique filename for the consti
                    $filename = 'cab_'.time().'.'. $consti->getClientOriginalExtension();

                    //Move the uploaded file to the public directory
                    $consti->move(public_path('storage/consti_and_bylaws').$fileName);

                    //Set the path to the uploaded pdf
                    $constiPath = $fileName;
                }

                $letterPath = null;
                if ($request->hasFile('letter_of_intent')) {
                    /*$letterPath = $request->file('letter_of_intent')->
                    storePubliclyAs('letter_of_intent', 'letter_' . time() . '.' . 
                    $request->file('letter_of_intent')->extension(), 'public');
                    */

                    $letter = $request->file('letter_of_intent'); //Retrive the Uploaded File

                    //Generate a unique filename for the letter
                    $filename = 'loi_'.time().'.'. $letter->getClientOriginalExtension();

                    //Move the uploaded file to the public directory
                    $letter->move(public_path('storage/letter_of_intent').$filename);

                    //Set the path to the uploaded pdf
                    $letterPath = $filename;
                }

                $adminEndorsementPath = null;
                if ($request->hasFile('admin_endorsement')) {
                    /*$adminEndorsementPath = $request->file('admin_endorsement')->
                    storePubliclyAs('admin_endorsement', 'endorsement_' . time() . '.' . 
                    $request->file('admin_endorsement')->extension(), 'public');
                    */
                    
                    $admin = $request->file('admin_endorsement'); //Retrieve the uploaded File

                    //Generate a unique filename for the Endorsement
                    $filename = 'ae_'.time().'.'. $admin->getClientOriginalExtension();

                    //Move the uploaded file to the public directory
                    $admin->move(public_path('storage/admin_endorsement').$filename);

                    //Set the path to the uploaded pdf
                    $adminEndorsementPath = $fileName;
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
            'admin_endorsement'=>$adminEndorsementPath,
        ]);
        return redirect('/osaemp/organization_list');

    }

    public function getEvents()
    {
        // Fetch events data with only the required fields
        $events = Event::all(['activity_title', 'activity_start_date', 'activity_end_date']);

       
        return response()->json($events);
    }

    public function getEvents(){
        $events = Event::all();

        $formattedEvents = $events->map(function ($event) {
            return [
                'title' => $event->activity_title,
                'start' => $event->activity_start_date,
                'end' => $event->activity_end_date,
            ];
        });
        
        return response()->json($formattedEvents);
    }

    public function calendarAjax(Request $request)
    {
        switch ($request->type) {
            case 'add':
                $event = Event::create([
                    'activity_title' => $request->activity_title,
                    'activity_start_date' => $request->activity_start_date,
                    'activity_end_date' => $request->activity_end_date,
                ]);
                return response()->json($event);
                break;

            case 'update':
                $event = Event::find($request->id);
                if ($event) {
                    $event->update([
                        'activity_title' => $request->activity_title,
                        'activity_start_date' => $request->activity_start_date,
                        'activity_end_date' => $request->activity_end_date,
                    ]);
                    return response()->json($event);
                }
                break;

            case 'delete':
                $event = Event::find($request->id);
                if ($event) {
                    $event->delete();
                    return response()->json(['success' => true]);
                }
                break;

            default:
                return response()->json(['error' => 'Invalid request']);
                break;
        }
    }


    
    public function pending_edit_view(Request $request){
        
        $id = $request->route('id');
        $org = Organization::find($id);
	    return view('OSA.organization_pending_edit')->with('org',$org);
        
    }
}
