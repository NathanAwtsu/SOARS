<?php

namespace App\Http\Controllers;


use App\Events\ChatifyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class OsaController extends Controller
{
    public function index(){

        

        return view('osaemp', ['users'=>$user, 'unseenCounter'=> $unseenCounter]);
    }

    public function checkUnseenMessage(){
        $unseenCounter = DB::table('ch_messages')
        ->where('to_id','=',Auth::user()->id)->where('seen','0')->count();
        return response()->json(["unseenCounter"=>$unseenCounter]);
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
        'other_source_of_fund'=> request('other_source_of_fund'),
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
        $totalOrg= DB::table('student_organizations')->get();
        return view('osaemp')
        ->with('totalEvent', $totalEvent)
        ->with('totalMember',$totalMember)
        ->with('totalOrg', $totalOrg);
        
    }
    
}
