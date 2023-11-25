<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
        'course_id' => $request->course_id,
        'member_status' => $request->member_status,
        'user_roles' => $request->user_roles,
        'username' => $request->username,
        'phone_number' => $request->phone_number,
    ];

    // Check if password is provided in the request
    if (!empty($request->password)) {
        $studentData['password'] = Hash::make($request->password); // Hash Password
    }

    $student = Students::updateOrCreate(
        ['student_id' => $studentId],
        $studentData
    );

    return response()->json($student);
}


    public function edit(Request $request)
    {
        $where = array('student_id' => $request->student_id);
        $student = Students::where($where)->first();

         return Response()->json($student);
    }

    public function delete(Request $request)
    {
        $student= Students::where('student_id',$request->student_id)->delete();

        return Response()->json($student);

    }
}
