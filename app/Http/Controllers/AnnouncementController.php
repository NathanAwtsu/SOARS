<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\ChatifyEvent;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Event;
use App\Models\Organization;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function osa_create(){
        $announcement = new Announcement();

        $user = Auth::user();
        $author = $user->name;

        $org_group = 'OSA';

        $announcement->title = request('title');
        $announcement->message= request('message');
        $announcement->author= $author;
        $announcement->recipient= request('recipient');
        $announcement->author_org= $org_group;
        $announcement->save();

        return redirect()->route('osaemp')->with('success', 'You have Created an Announcement named: '.$announcement->title);

    }
}
