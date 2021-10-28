<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Carbon\Carbon;
class CalendarController extends Controller
{
    //
    public function calendarIndex(){


        return view('calendar.appointment-calendar');
    }

    public function calendar()
    {
        //$events = [];

        $fucks = Appointment::with(['patient', 'service'])
                  ->where('status', 'Scheduled')
                  ->get();

       
        foreach ($fucks as $fuck){
            //if(!$fuck->date){
              //  continue;
            //}
             
            $events[] = [
                'title' =>$fuck->patient->firstname .' '.$fuck->patient->middlename. ' ' . $fuck->patient->lastname .' ('.$fuck->service->service.' '.$fuck->time.')',
                'start' =>$fuck->date //' ('.$fuck->time.')',//Carbon::parse($fuck->time),
                //'backgroundColor' => '#00FF00',
                //'end' => Carbon::parse($fuck->date)->addDay()->addHours(15)->subHours(1),
                //'nextDayThreshold' => '00:00', ->setTimezone('Asia/Singapore')
                 //'allDay' =>  false,
                //'url' => route('appointment.edit',$fucks->id),
            ];
        }

        //dd($events);
    	///return view('dashboard.dashboard', compact('events'));
        return response()->json($events,200);
    }
}
