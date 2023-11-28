<?php

namespace App\Http\Controllers;

use App\Events\ChatifyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
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

    
}
