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

use setasign\Fpdi\Fpdi;


class OsaController extends Controller
{
    public function index(){


        return view('osaemp', ['users'=>$user, 'unseenCounter'=> $unseenCounter]);
    }

    public function activity_pending_retrieve(){
        $activity = DB::table('events')->whereNotIn('status', ['Approved', 'On Hold', 'Done'])->get();
        $approved = DB::table('events')->whereIn('status', ['Approved', 'On Hold', 'Done'])->get();
        $org = DB::table('organizations')->where('requirement_status','=','complete')->get();

        
        return view('OSA.approval', ['activity'=> $activity])
        ->with('approved',$approved)
        ->with('org', $org);
    }

    public function store(){

        
        
        DB::table('events')->insert([
        'id' => request('id'),
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
        return redirect('/osaemp/activity_approval')
        ->with('success', 'You have created an Event');

    }

    public function event_Approve_or_edit(Request $request){
        if ($request->has('approve')) {
            $approve = $request->input('approve');
            // Extract event ID from the action (e.g., "approve_1" becomes "1")
            $eventId = substr($approve, strpos($approve, '_') + 1);
            $eventData = ['status' => 'Approved'];
            DB::table('events')->where('id', $eventId)->update($eventData);
        } 
        elseif ($request->has('edit')) {
            $edit = $request->input('edit');
            // Extract event ID from the action (e.g., "edit_1" becomes "1")
            $eventId = substr($edit, strpos($edit, '_') + 1);
            // Redirect to edit route with the event ID for editing
            return redirect()->route('edit_pending_activity', ['id' => $eventId]);
        }
        elseif($request->has('action')){
            $reject = $request->input('action');
            // Extract event ID from the action (e.g., "approve_1" becomes "1")
            $eventId = substr($reject, strpos($reject, '_') + 1);
            $eventData = ['status' => 'Rejected'];
            DB::table('events')->where('id', $eventId)->update($eventData);
        }
        return redirect('/osaemp/activity_approval');
    }
    

    public function edit_pending_activity($id) {
        // Retrieve the event data based on the ID and pass it to the edit view
        $event = Event::findOrFail($id);
        $activity = DB::table('events')->where('id','!=','Approved')->get();
        $partner_org = DB::table('organizations')->where('requirement_status','=','complete')->get();
        $pending_event = DB::table('events')->where('id','=',$id)->get();
        return view('OSA.edit_pending_activity')
        ->with('pending_event', $pending_event)
        ->with('partner_org', $partner_org);
    }

    public function edit_save_pending_activity(Request $request, $id) {
        // Find the event by ID
        $event = Event::findOrFail($id);
    
        // Update the fields with the new values from the request
        $event->update([
            'status' => $request->input('status'),
            'organization_name' => $request->input('organization_name'),
            'activity_title' => $request->input('activity_title'),
            'type_of_activity' => $request->input('type_of_activity'),
            'activity_start_date' => $request->input('activity_start_date'),
            'activity_end_date' => $request->input('activity_end_date'),
            'activity_start_time' => $request->input('activity_start_time'),
            'activity_end_time' => $request->input('activity_end_time'),
            'venue' => $request->input('venue'),
            'participants' => $request->input('participants'),
            'partner_organization' => $request->input('partner_organization'),
            'organization_fund' => $request->input('organization_fund'),
            'solidarity_share' => $request->input('solidarity_share'),
            'registration_fee' => $request->input('registration_fee'),
            'AUSG_subsidy' => $request->input('AUSG_subsidy'),
            'sponsored_by' => $request->input('sponsored_by'),
            'ticket_selling' => $request->input('ticket_selling'),
            'ticket_control_number' => $request->input('ticket_control_number'),
            'other_source_of_fund' => $request->input('other_source_of_fund')
        ]);
        
        return redirect('/osaemp/activity_approval')->with('success', 'You have updated the Event: '. $request->input('activity_title'));
    }
    

    public function eventReport(){
        $activity = DB::table('events')->where('status','=','Approved')->get();
        return view('OSA.reports', ['activity'=> $activity]);
    }

    public function totalDashboard(){
        
        $totalEvent = DB::table('events')->get();
        $totalMember = DB::table('students')->get();
        $totalOrg= DB::table('organizations')->get();
        $totalPendingOrg = DB::table('organizations')->where('requirement_status','!=','complete')->get();
        $activities = DB::table('events')->select('activity_title', 'activity_start_date', 'activity_end_date', 'activity_start_time', 'activity_end_time')->get();
        return view('osaemp')
        ->with('totalEvent', $totalEvent)
        ->with('totalMember',$totalMember)
        ->with('totalOrg', $totalOrg)
        ->with('totalPendingOrg', $totalPendingOrg)
        ->with('activities', $activities);
        
    }

    public function dashboard_Activities(){
        $approved = DB::table('events')->whereIn('status', ['Approved', 'On Hold', 'Done'])->get();

        return view('OSA.activity')->with('approved',$approved);
    }

    

    public function user(){
        $info=DB::table('users')->where('role','=','2')->where('role','=','3')->where('role','=','4')->get();
        return view('OSA.userlist')
        ->with('info', $info);

    }

    public function org_act_list(Request $request){

        $org_activation = DB::table('organizations')->get();
        $organizationAcademic = DB::table('organizations')->where('type_of_organization','=','Academic')->where('requirement_status','=','complete')->get();
        $organizationCoAcademic = DB::table('organizations')->where('type_of_organization','=','Co-Academic')->where('requirement_status','=','complete')->get();
        $organizationSocioCivic = DB::table('organizations')->where('type_of_organization','=','Socio Civic')->where('requirement_status','=','complete')->get();
        $organizationReligious = DB::table('organizations')->where('type_of_organization','=','Religious')->where('requirement_status','=','complete')->get();
        return view('OSA.organization_activation')
        ->with('org_activation', $org_activation)
        ->with('organizationAcademic', $organizationAcademic)
        ->with('organizationCoAcademic', $organizationCoAcademic)
        ->with('organizationSocioCivic', $organizationSocioCivic)
        ->with('organizationReligious', $organizationReligious);
    }

    


    public function getEvents(){
        // Fetch events from the database
    $events = Event::all();

    // Format events as required by FullCalendar
    $formattedEvents = $events->map(function ($event) {
        $startDateTime = $event->activity_start_date . 'T' . $event->activity_start_time;
        $endDateTime = $event->activity_end_date . 'T' . $event->activity_end_time;

        return [
            'title' => $event->activity_title,
            'start' => $startDateTime,
            'end' => $endDateTime,
        ];
    });

    

    // Return the formatted events data
    return response()->json($formattedEvents);
    }

    public function getEventsOrg($id)
{
    $org = Organization::findOrFail($id);
    $events = Event::where('organization_name', $org->name)->get(); // Add get() to execute the query
    
    // Format events as required by FullCalendar
    $formattedEvents = $events->map(function ($event) {
        $startDateTime = $event->activity_start_date . 'T' . $event->activity_start_time;
        $endDateTime = $event->activity_end_date . 'T' . $event->activity_end_time;

        return [
            'title' => $event->activity_title,
            'start' => $startDateTime,
            'end' => $endDateTime,
        ];
    });

    return response()->json($formattedEvents); // Return the formatted events as JSON response
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

    public function generate (Request $request, $eventId)
    {
        $event = Event::findOrFail($eventId);

        $pdf = new Fpdi();

        $pdf->AddPage('L');

        $pdf->SetFont('Helvetica', 'B', 16);

        $templatePath = public_path('photos/testcert.png');
        $pdf->Image($templatePath, 0, 0, 297, 210);
        $pdf->SetXY(63, 106.5); 
        $pdf->Cell(0, 10, $event->activity_title, 0, 1, 'C'); 

        $pdf->SetXY(50, 117.5); 
        $pdf->Cell(0, 10, $event->activity_start_date, 0, 1, 'C'); 

        
        $pdf->Output('certificate.pdf', 'D');
    }
}
