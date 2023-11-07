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
        $studentId = $request->id;
  
        $student   =   Students::updateOrCreate(
                    [
                     'student_id' => $studentId
                    ],
                    [
                        'last_name' => $request->last_name,
                        'middle_initial' => $request->middle_initial,
                        'first_name' => $request->first_name,
                        'email' => $request->email,
                        'course_id' => $request->course_id,
                        'password' => Hash::make($request->password), //Hash Password
                        'member_status' => $request->member_status,
                        'user_roles' => $request->user_roles,
                        'username' => $request->username,
                        'phone_number' => $request->phone_number    
                    ]);    
                          
        return Response()->json($student);
    }
}
