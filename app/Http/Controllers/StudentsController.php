<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
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
use Datatables;

class StudentsController extends Controller
{

    public function dashboard(){

        return view('Student.dashboard');
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

    public function announcement(){
        return view('Student.announcements');
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

            $organization = Organization::where('academic_course_based', $courseId)->first();

            if ($organization) {
                $studentData['organization1'] = $organization->name; // Store organization name
            } else {
                
                return response()->json(['message' => 'No organization found for the provided academic course'], 400);
            }

            $datetime = now();
            $studentId = $request->student_id;
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
            $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_';
            $randomString = Str::random(10);

            $name = $fname.' '.$mname.' '.$lname;
            DB::table('users')->insert([
                'id' => $studentId,
                'role' => '3',
                'name' => $name,
                'email' => $request->email,
                'email_verified_at' => $datetime,
                'phone_number' => $request->phone_number,
                'password' => Hash::make($request->password),
                'remember_token'=> $randomString,
                'created_at'=>$datetime,
                'updated_at' =>$datetime,
            ]);

            return response()->json(['message' => 'Student information saved successfully']);
    }


        public function edit(Request $request)
        {
            $student = DB::table('students')->where('student_id', $request->student_id)->first();

        return response()->json($student);
    }

    public function update(Request $request)
    {
        $studentId = $request->student_id;

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
        if (!empty($request->password)) {
            $studentData['password'] = Hash::make($request->password); // Hash Password
        }

        DB::table('students')->where('student_id', $studentId)->update($studentData);

        return response()->json(['message' => 'Student information updated successfully']);
    }

        public function delete(Request $request)
        {
            $student = DB::table('students')->where('student_id', $request->student_id)->delete();
            DB::table('users')->where('id', $request->student_id)->delete();
            return response()->make('Student deleted successfully');

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
    
}