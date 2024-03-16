<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Osa;
use App\Models\User;
use Datatables;

class OsaEmpController extends Controller
{
    public function osalist()
    {
        $osaEmployeesCount = Osa::count();

        if(request()->ajax()) {
            return datatables()->of(Osa::select('*'))
            ->addColumn('action', 'Admin.osa_action')
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make(true);
        }

        return view ('Admin.osa_list', compact('osaEmployeesCount'));
    }

    public function stores(Request $request)
    {
        $datetime = now();
        $employeeId = $request->employee_id;
        $employeeData = [
            'last_name' => $request->last_name,
            'middle_initial' => $request->middle_initial,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'email_verified_at' => $datetime,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone_number,
        ];
        
        // Check if password is provided in the request
        if (!empty($request->password)) {
            $employeeData['password'] = Hash::make($request->password); // Hash Password
        }

        

        DB::table('osa')->updateOrInsert(
            ['employee_id' => $employeeId],
            $employeeData
        );
        $fname= $request->first_name;
        $mname= $request->middle_initial;
        $lname= $request->last_name;
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_';
        $randomString = Str::random(10);

        $name = $fname.' '.$mname.' '.$lname;
        DB::table('users')->insert([
            'id' => $employeeId,
            'role' => '2',
            'name' => $name,
            'email' => $request->email,
            'email_verified_at' => $datetime,
            'password' => Hash::make($request->password),
            'remember_token'=> $randomString,
            'created_at'=>$datetime,
            'updated_at' =>$datetime,
            ]);
        
        
            return response()->json('Employee information saved successfully');
    }

    public function edits(Request $request)
    {
        $employee = DB::table('osa')->where('employee_id', $request->employee_id)->first();

    return response()->json($employee);
    }

    public function updates(Request $request)
    {
        $employeeId = $request->employee_id;

        $employeeData = [
            'last_name' => $request->last_name,
            'middle_initial' => $request->middle_initial,
            'first_name' => $request->first_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
        ];

        // Check if password is provided in the request
        if (!empty($request->password)) {
            $employeeData['password'] = Hash::make($request->password); // Hash Password
        }

        DB::table('osa')->where('employee_id', $employeeId)->update($employeeData);

        return response()->make(['message' => 'OSA Employee information updated successfully']);
    }

    public function deletes(Request $request)
    {
        
        $employee = DB::table('osa')->where('employee_id', $request->employee_id)->delete();
        DB::table('users')->where('id', $request->employee_id)->delete();
        return response()->make('OSA Employee deleted successfully');

    }

}
