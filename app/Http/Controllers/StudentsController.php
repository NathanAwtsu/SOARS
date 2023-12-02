<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Students;
use Datatables;

class StudentsController extends Controller
{
    public function studlist()
    {
        if(request()->ajax()) {
            return datatables()->of(Students::select('*'))
            ->addColumn('action', 'student-action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view ('student-list');
    }

    public function store(Request $request)
    {
        $datetime = now();
        $studentId = $request->student_id;
        $studentData = [
            'last_name' => $request->last_name,
            'middle_initial' => $request->middle_initial,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'organization1' => $request->organization1,
            'organization2' => $request->organization2,
            'organization3' => $request->organization3,
            'org1_member_status' => $request->org1_member_status,
            'org2_member_status' => $request->org2_member_status,
            'org3_member_status' => $request->org3_member_status,
            'user_roles' => $request->user_roles,
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
        $mname= $request->middle_inital;
        $lname= $request->last_name;
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_';
        $randomString = Str::random(10);

        $name = $fname.' '.$mname.' '.$lname;
        DB::table('users')->insert([
            'id' => $studentId,
            'role' => '4',
            'name' => $name,
            'email' => $request->email,
            'email_verified_at' => $datetime,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
            'remember_token'=> $randomString,
            'created_at'=>$datetime,
            'updated_at' =>$datetime,
        ]);

    $student = Students::where('student_id', $studentId)->first();

    $responseText = ($student) ? 'Student information updated successfully' : 'Failed to update student information';

    return response()->make($responseText);
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
        'email' => $request->email,
        'organization1' => $request->organization1,
        'organization2' => $request->organization2,
        'organization3' => $request->organization3,
        'org1_member_status' => $request->org1_member_status,
        'org2_member_status' => $request->org2_member_status,
        'org3_member_status' => $request->org3_member_status,
        'user_roles' => $request->user_roles,
        'phone_number' => $request->phone_number,
    ];

    // Check if password is provided in the request
    if (!empty($request->password)) {
        $studentData['password'] = Hash::make($request->password); // Hash Password
    }

    DB::table('students')->where('student_id', $studentId)->update($studentData);

    return response()->make(['message' => 'Student information updated successfully']);
}

    public function delete(Request $request)
    {
        $student = DB::table('students')->where('student_id', $request->student_id)->delete();
        DB::table('users')->where('id', $request->student_id)->delete();
        return response()->make('Student deleted successfully');

    }
}