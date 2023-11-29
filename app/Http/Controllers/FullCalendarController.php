<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class FullCalendarController extends Controller
{
    public function lol(){
        $events = Event::all();

        $formattedEvents = $events->map(function ($event) {
            return [
                'activity_title' => $event->title,
                'activity_start_datetime' => $event->start,
                'activity_end_datetime' => $event->end,
            ];
        });

        return view('fullcalendar', compact('formattedEvents'));
    }
}
