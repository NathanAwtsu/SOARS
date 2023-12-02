<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('OSA.user');
    }

    public function update(Request $request)
    {
        // Logic to update the user's profile (password, profile picture, contact number)

        // Example: Update password
        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // Example: Update profile picture
        // (You need to handle file upload logic here)

        // Example: Update contact number and email
        $user->phone_number = $request->input('contactNumber');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('user.index')->with('success', 'Profile updated successfully.');
    }

    public function info(Request $request){
        $user = Auth::user();
        $userInfo = DB::table('users')->where('id','=', $user)->get();
        return view('OSA.user')->with('userInfo', $userInfo);
    }
}
