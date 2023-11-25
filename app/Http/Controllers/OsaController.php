<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class OsaController extends Controller
{
    public function index(){

        $unseenCount = DB::table('ch_messages')->where('to_id','=',Auth::user()->id)->where('seen','=','0')->count();

        return view('osaemp', ['users'=>$user, 'unseenCounter'=> $unseenCount]);
    }
}
