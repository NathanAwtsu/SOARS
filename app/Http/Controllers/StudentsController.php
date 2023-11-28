<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
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
        $studentId = $request->student_id;
        $studentData = [
            'last_name' => $request->last_name,
            'middle_initial' => $request->middle_initial,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'member_status' => $request->member_status,
            'user_roles' => $request->user_roles,
            'username' => $request->username,
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
        'member_status' => $request->member_status,
        'user_roles' => $request->user_roles,
        'username' => $request->username,
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

        return response()->make('Student deleted successfully');

    }
}