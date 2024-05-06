<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Announcement;
use App\Events\ChatifyEvent;
use App\Models\Event;
use App\Models\Organization;
use App\Models\Osa;
use App\Models\User;
use App\Models\Students;
use App\Models\StudentOrganization;
use App\Mail\VerifyEmail;
use Datatables;
use setasign\Fpdi\Fpdi;

class StudentsController extends Controller
{

    public function dashboard(){
        $user = Auth::user();
        $userId = $user->id; //Student No
        $student = DB::table('students')->where('student_id','=' ,$userId)->first(); //Select Row from Student
        $studentId = $student->student_id; //Student Id from Students Table
        $student_org = DB::table('student_organizations')
        ->where('studentId', '=', $studentId)->first(); //Select Row from student_organization if student_id match
        $student_pos = $student_org->org1_memberstatus; //Select org Status 1
        $courseId = $student_org->course; //Select student Course from Student_organization
        $orgsByCourse = DB::table('organizations')
        ->where('academic_course_based','=',$courseId)->first(); //Select Row from organization if academic_course match with student course
        $org = $orgsByCourse->name; //Select Org Name

        $announcement1 = DB::table('announcements')->where('recipient','=', $org)->get(); //Select Row of Data from announcements where recipient is from the org

        return view('Student.dashboard')
        ->with('announcement1', $announcement1);
    }

    public function getEvents(){
        $user = Auth::user();
        $userId = $user->id; //Student No
        $student = DB::table('students')->where('student_id','=' ,$userId)->first(); //Select Row from Student
        $studentId = $student->student_id; //Student Id from Students Table
        $student_org = DB::table('student_organizations')
        ->where('studentid', '=', $studentId)->first(); //Select Row from student_organization if student_id match
        $student_pos = $student_org->org1_memberstatus; //Select org Status 1
        $courseId = $student_org->course; //Select student Course from Student_organization
        $orgsByCourse = DB::table('organizations')
        ->where('academic_course_based','=',$courseId)->first(); //Select Row from organization if academic_course match with student course
        $org = $orgsByCourse->name;
        // Fetch events from the database
        $events = Event::where('organization_name','=',$org)->get();

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

    public function announcement(){

        $user = Auth::user();
        $userId = $user->id; //Student No
        $student = DB::table('students')->where('student_id','=' ,$userId)->first(); //Select Row from Student
        $studentId = $student->student_id; //Student Id from Students Table
        $student_org = DB::table('student_organizations')->where('studentid', '=', $studentId)->first(); //Select Row from student_organization if student_id match
        $student_pos = $student_org->org1_memberstatus; //Select org Status 1
        $student_org2 = $student_org->org2;
        $courseId = $student_org->course; //Select student Course from Student_organization
        $orgsByCourse = DB::table('organizations')
        ->where('academic_course_based','=',$courseId)->first(); //Select Row from organization if academic_course match with student course
        $org = $orgsByCourse->name;
        // Fetch events from the database
        $events = Event::where('organization_name','=',$org)->get();


        
        $announce = DB::table('announcements')
                    ->where(function ($query) use ($org, $student_org2) {
                        $query->where('author_org', '=', $org)
                              ->where('recipient', '=', $org)
                              ->orWhere('author_org', '=', $student_org2)
                              ->orWhere('recipient', '=', $student_org2);
                    })
                    ->get();

    return view('Student.announcements')->with('announce', $announce);
    }

    public function org_list(){
        $organizationAcademic = DB::table('organizations')->where('type_of_organization','=','Academic')->where('requirement_status','=','complete')->get();
        $organizationCoAcademic = DB::table('organizations')->where('type_of_organization','=','Co-Academic')->where('requirement_status','=','complete')->get();
        $organizationSocioCivic = DB::table('organizations')->where('type_of_organization','=','Socio Civic')->where('requirement_status','=','complete')->get();
        $organizationReligious = DB::table('organizations')->where('type_of_organization','=','Religious')->where('requirement_status','=','complete')->get();
        return view('Student.org_list')
        ->with('organizationAcademic', $organizationAcademic)
        ->with('organizationCoAcademic', $organizationCoAcademic)
        ->with('organizationSocioCivic', $organizationSocioCivic)
        ->with('organizationReligious', $organizationReligious);
    }



    public function studlist(){
        $org = DB::table('organizations')
            ->where('requirement_status', '=', 'complete')
            ->get();

        if (request()->ajax()) {
            return datatables()->of(Students::select('*'))
                ->addColumn('action', 'student-action')
                ->rawColumns(['action'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('student-list', compact('org'));
    }

    public function getOrganizations(Request $request)
    {
        $courseId = $request->course_id;
        $organizations = Organization::where('academic_course_based', $courseId)->get();
        return response()->json($organizations);
    }



       public function store(Request $request)
        {
            
            $courseId = $request->course_id;
            $studentId = $request->student_id;
            /*
            $stuentTableVerify = DB::table('student')->where('student_id', $studentId)->get();
            $studentorgTableVerify = DB::table('student_organizations')->where('studentId', $studentId)->get();
            $userVerify = DB::table('users')->where('id', $studentId)->get();
            */

            $organization = Organization::where('academic_course_based', $courseId)->first();

            $organization2 = ($request->organization2 == "null") ? null : $request->organization2;

            if (!$organization) {
                return response()->json(['message' => 'No organization found for the provided academic course'], 400);
            }
            
            $datetime = now();
            $studentData = [
                'last_name' => $request->last_name,
                'middle_initial' => $request->middle_initial,
                'first_name' => $request->first_name,
                'course_id' => $request->course_id,
                'email' => $request->email,
                'email_verified_at' => null,
                'organization1' => $organization->nickname,
                'organization2' => $organization2,
                'org1_member_status' => $request->org1_member_status,
                'org2_member_status' => $request->org2_member_status,
                'phone_number' => $request->phone_number,
            ];

            // Check if password is provided in the request
            if (!empty($request->password)) {
                $studentData['password'] = Hash::make($request->password); // Hash Password
            }

            DB::table('students')->updateOrInsert(
                ['student_id' => $studentId],
                $studentData
            );

            $fname= $request->first_name;
            $mname= $request->middle_initial;
            $lname= $request->last_name;
            $randomString = Str::random(10);

            $name = $fname.' '.$mname.' '.$lname;

            $verificationToken = Str::random(60);
            
            $studentData2 = [
                'course' => $request->course_id,
                'org1' => $organization->name,
                'org1_memberstatus' => $request->org1_member_status,
                'org2' => $organization2,
                'org2_memberstatus' => $request->org2_member_status,
            ];

            DB::table('student_organizations')->updateOrInsert([
                'studentId' => $studentId],
                $studentData2);

            $fname= $request->first_name;
            $mname= $request->middle_initial;
            $lname= $request->last_name;
            $randomString = Str::random(10);
            $userExists = User::find($studentId);

            if (!$userExists) {
                $name = $request->first_name . ' ' . $request->middle_initial . ' ' . $request->last_name;
        
                DB::table('users')->insert([
                    'id' => $studentId,
                    'role' => '3',
                    'name' => $name,
                    'email' => $request->email,
                    'email_verified_at' => null, // You may adjust this based on your requirements
                    'password' => Hash::make($request->password),
                    'remember_token' => $randomString,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            
                $user = User::where('id', $studentId)->first();
                
                event(new Registered($user));
            }
            
            else
            {
                $name = $request->first_name . ' ' . $request->middle_initial . ' ' . $request->last_name;
                DB::table('users')->where('id', $studentId)->update(
                    ['name' => $name],
                    ['email' => $request->email],
                    ['password' => Hash::make($request->password)],
                    ['remember_token' => $randomString],
                    ['updated_at' => now()]
                );
            }
            
        
            return response()->json(['message' => 'Student information saved successfully']);
    }
            


        public function edit(Request $request)
        {
            $student = DB::table('students')->where('student_id', $request->student_id)->first();
            $studentOrg = DB::table('student_organizations')->where('studentId', $request->student_id)->first();

        return response()->json($student);
    }

    public function update(Request $request)
    {
        $studentId = $request->student_id;
    
        // Retrieve the current organization information for the student
        $currentStudentOrg = DB::table('student_organizations')->where('studentId', $studentId)->first();
    
        // Retrieve the student record from the database
        $student = Student::where('student_id', $studentId)->first();
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
    
        // Prepare student data for updating
        $studentData = [
            'last_name' => $request->last_name,
            'middle_initial' => $request->middle_initial,
            'first_name' => $request->first_name,
            'course_id' => $request->course_id,
            'email' => $request->email,
            'organization1' => $request->organization1,
            'organization2' => $request->organization2,
            'org1_member_status' => $request->org1_member_status,
            'org2_member_status' => $request->org2_member_status,
            'phone_number' => $request->phone_number,
        ];
    
        // Check if password is provided in the request
        if ($request->filled('password')) {
            $studentData['password'] = Hash::make($request->password);
        }
    
        // Update student information in the students table
        $student->fill($studentData);
        $student->save();
    
        // Update or insert student organization information
        if ($currentStudentOrg) {
            // If student organization record exists, update it
            DB::table('student_organizations')->where('studentId', $studentId)->update([
                'course' => $request->course_id,
                'org1' => $request->organization1,
                'org1_memberstatus' => $request->org1_member_status,
                'org2' => $request->organization2,
                'org2_memberstatus' => $request->org2_member_status,
            ]);
        } else {
            // If student organization record doesn't exist, insert it
            DB::table('student_organizations')->insert([
                'studentId' => $studentId,
                'course' => $request->course_id,
                'org1' => $request->organization1,
                'org1_memberstatus' => $request->org1_member_status,
                'org2' => $request->organization2,
                'org2_memberstatus' => $request->org2_member_status,
            ]);
        }
    
        return response()->json(['message' => 'Student information updated successfully']);
    }


        public function delete(Request $request)
        {
            $student = DB::table('students')->where('student_id', $request->student_id)->delete();
            DB::table('users')->where('id', $request->student_id)->delete();
            DB::table('student_organizations')->where('studentId', $request->student_id)->delete();
            return response()->json(['message' => 'Student information deleted successfully']);

        }

        public function getStudentCount() {
            $studentCount = Students::count();
            return $studentCount;
        }

        public function getOsaEmpCount() {
            $osaEmpCount = Osa::count();
            return $osaEmpCount;
        }
        
        public function showDashboard() {
            $studentCount = $this->getStudentCount();
            $osaEmpCount = $this->getOsaEmpCount();
            $recentUsers = $this->recentUser();
            $RSOCount = $this->getRSOCount();
            return view('Admin.admin', [
                'studentCount' => $studentCount,
                'osaEmpCount' => $osaEmpCount,
                'recentUsers' =>$recentUsers,
                'RSOCount'    =>$RSOCount,
            ]);
        }
        
        public function showUsers(){
            $recentUsers = $this->recentUser();
            return view('Admin.audit_log', [
                'recentUsers' =>$recentUsers,
            ]);
        }

        public function recentUser($perPage = 10)
        {
            $recentUsers = User::orderBy('created_at', 'desc')
                            ->paginate($perPage);

            return $recentUsers;
        }

        public function getRSOCount() {
            $RSOCount = Organization::where('requirement_status', 'complete')->count();
            return $RSOCount;
        }

        public function sl_activity_proposal(){
            $user = Auth::user();
            $userId = $user->id; //Student No
            $student = DB::table('students')->where('student_id','=' ,$userId)->first(); //Select Row from Student
            $studentId = $student->student_id; //Student Id from Students Table
            $student_org = DB::table('student_organizations')
            ->where('studentId', '=', $studentId)->first(); //Select Row from student_organization if student_id match
            $student_pos = $student_org->org1_memberstatus; //Select org Status 1
            $courseId = $student_org->course; //Select student Course from Student_organization
            $orgsByCourse = DB::table('organizations')
            ->where('academic_course_based','=',$courseId)->first(); //Select Row from organization if academic_course match with student course
            $org = $orgsByCourse->name; //Select Org Name
            $orgId = $orgsByCourse->id;

            $pendingEvents = DB::table('events')->whereIn('status', ['Standby', 'Rejected'])->where('organization_name', '=', $org)->get();

            // Define or retrieve the $eventId 
            $eventId = DB::table('events')->where('status', ['Approved', 'Done'])->value('id');
            if($eventId != null){
            $event = Event::findOrFail($eventId);
            $members = $this->getMembers($org);
            }else {
                // If $eventId is null, set $event and $members to default values
                $event = "Null";
                $members = "Null";
            }
            $orgs = DB::table('organizations')->get();
            $approved = DB::table('events')->whereIn('status', ['Approved', 'On Hold', 'Done'])->where('organization_name', '=',$org)->get();
            $activity = DB::table('events')->where('organization_name','=', $org)->where('status','=','Stand By')->get();
            
            
            return view('Student.activity_proposal')
            ->with('pendingEvents', $pendingEvents)
            ->with('approved', $approved)
            ->with('orgsByCourse',$orgsByCourse)
            ->with('orgs', $orgs)
            ->with('activity', $activity)
            ->with('event', $event)
            ->with('members', $members)
            ->with('organization_id', $orgId);
        }

        public function store_events(Request $request){
            $event = new Event();
        
            // Handle file upload for Letter of Approval
            if ($request->hasFile('letter_of_approval')) {
                $file = $request->file('letter_of_approval');
                // Check if the file is valid
                if ($file->isValid()) {
                    $fileName = 'letter_of_approval_' . time() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('storage/letter_of_approval/'), $fileName);

                    $event->letter_of_approval = $fileName;
                } else {
                    return redirect()->back()->withInput()->withErrors(['file_error' => 'Invalid file upload.']);
                }
            }
            
            // Assign values to the properties of the model instance
            $event->status = request('status');
            $event->organization_name = request('organization_name');
            $event->activity_title = request('activity_title');
            $event->type_of_activity = request('type_of_activity');
            $event->activity_start_date = request('activity_start_date');
            $event->activity_end_date = request('activity_end_date');
            $event->activity_start_time = request('activity_start_time');
            $event->activity_end_time = request('activity_end_time');
            $event->venue = request('venue');
            $event->participants = request('participants');
            $event->partner_organization = request('partner_organization');
            $event->organization_fund = request('organization_fund');
            $event->solidarity_share = request('solidarity_share');
            $event->registration_fee = request('registration_fee');
            $event->AUSG_subsidy = request('AUSG_subsidy');
            $event->sponsored_by = request('sponsored_by');
            $event->ticket_selling = request('ticket_selling');
            $event->ticket_control_number = request('ticket_control_number');
            $event->other_source_of_fund = request('other_source_of_fund');

            // Save the model instance to the database
            $event->save();

            return redirect('/student/propose_activity')->with('success', 'You have created an Event');

        }

        public function event_done(){
            try {
                if ($request->has('done')) {
                    $edit = $request->input('done');
                    $eventId = substr($edit, strpos($edit, '_') + 1);
                    $eventData = ['status' => 'Done'];
                    DB::table('events')->where('id', $eventId)->update($eventData);
                } 
                
        
                return redirect()->back()->with('success', 'Event action performed successfully.');
            } catch (\Exception $e) {
                return redirect()->back()->with('error', 'An error occurred while processing the request.');
            }
        }

        public function members(){ 

            $user = Auth::user();
            $userId = $user->id; //Student No
            $student = DB::table('students')->where('student_id','=' ,$userId)->first(); //Select Row from Student
            $studentId = $student->student_id; //Student Id from Students Table
            $student_org = DB::table('student_organizations')
            ->where('studentid', '=', $studentId)->first(); //Select Row from student_organization if student_id match
            $student_pos = $student_org->org1_memberstatus; //Select org Status 1
            $courseId = $student_org->course; //Select student Course from Student_organization
            $orgsByCourse = DB::table('organizations')
            ->where('academic_course_based','=',$courseId)->first(); //Select Row from organization if academic_course match with student course
            $org = $orgsByCourse->name; //Select Org Name


            $info=DB::table('students')->where('course_id','=',$courseId)->get();
            return view('Student.org1_member_list')
            ->with('info', $info);
        }

        public function members2(){ 

            $user = Auth::user();
            $userId = $user->id; //Student No
            $student = DB::table('students')->where('student_id','=' ,$userId)->first(); //Select Row from Student
            $studentId = $student->student_id; //Student Id from Students Table
            $student_org = DB::table('student_organizations')
            ->where('studentId', '=', $studentId)->first(); //Select Row from student_organization if student_id match
            $student_pos = $student_org->org2_memberstatus; //Select org Status 2
            $orgName = $student_org->org2;
            $org = $orgName;
            $organization = DB::table('organizations')->where('name', '=', $orgName)->first();

            $info=DB::table('students')->where('organization2','=',$orgName)->get();
            return view('Student.org2_member_list')
            ->with('info', $info);
        }

        public function fetchOrganizations() {
            $organizations = Organization::where('type_of_organization', '!=', 'Academic')->get();
            return response()->json($organizations);
        }

        public function getMembers($organization_name) {
            
            
            $members = Students::where('organization1', $organization_name)
            ->orWhere('organization2', $organization_name)
            ->get();

            return $members;
        }
          

    public function generate (Request $request, $eventId, $studentId)
    {
        $event = Event::findOrFail($eventId);
        $students = Students::findOrFail($studentId);

        $pdf = new Fpdi();

        $pdf->AddPage('L');

        $pdf->SetFont('Helvetica', 'B', 16);

        $templatePath = public_path('photos/testcert.png');
        $pdf->Image($templatePath, 0, 0, 297, 210);

        
        $pdf->SetXY(67, 106.5); 
        $pdf->Cell(0, 10, $event->activity_title, 0, 1, 'C');
        
        $pdf->SetXY(50, 117.5); 
        $pdf->Cell(0, 10, $event->activity_start_date, 0, 1, 'C'); 
        
        $pdf->SetFont('Helvetica', '', 18);
        $pdf->SetXY(47, 20);
        $pdf->Cell(0, 10, $event->organization_name, 0, 1, 'L');

        $pdf->SetFont('Helvetica', '', 28);
        
        $pdf->SetXY(28, 80); 
        $pdf->Cell(0, 10, $students->first_name . ' ' . $students->last_name, 0, 1, 'C');


        
        $pdf->Output('certificate.pdf', 'D');
    }

    
}