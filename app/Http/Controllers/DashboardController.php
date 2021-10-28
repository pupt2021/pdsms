<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Medicine;
use App\Models\Supply;
use App\Models\Patient;
use App\Models\Service;
use Carbon\Carbon;
use DB;
use App\Models\Event;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    function index()
    {
        //$todays_appointment = Appointment::all();

        //long method
        //$todays_appointment = Appointment::where('created_at', '>=', date('Y-m-d') . ' 00:00:00')
        //->where('created_at', '<=', date('Y-m-d') . ' 23:59:59')
        //->get();

        //short method
        //$todays_appointment = Appointment::whereRaw("DATE(date) = '" . date('Y-m-d') . "'")->get();
        //$todays_appointment = Appointment::whereDate('date', Carbon::today())->get();
        
       /*$t_a = Appointment::whereDate('date', DB::raw('CURDATE()'));
       
       if($t_a)
        {
             $todays_appointment = Appointment::whereDate('date', DB::raw('CURDATE()'))->get();
        }

        $tom_a = Appointment::whereDate('date', DB::raw('CURDATE() + interval 1 day'));
        if($tom_a)
        {
            $tomorrows_appointment = Appointment::whereDate('date', DB::raw('CURDATE() + interval 1 day'))->get();
        }*/
         
       
           
         //get appointments for the past 30 days
             //$todays_appointment = Appointment::whereDate('created_at', now()->subDays(30))->get();

        //get appointments for the month current month
            //$todays_appointment = Appointment::whereYear('created_at', now()->year)
            //->whereMonth('created_at', now()->month)
            //->get();
    


        $users = User::count();
        $medicines = Medicine::count();
        $supply = Supply::count();
        $appointments = Appointment::count();

        //bar chart datas
        $appointmentss = Appointment::select(DB::raw("COUNT(*) as count"))
            ->whereYear('date', date('Y'))
            ->where('status','Closed')
            ->groupBy(DB::raw("MONTH(date)"))
            //->groupBy('status')
            ->pluck('count');

        $months = Appointment::select(DB::raw("MONTH(date) as month"))
            ->whereYear('date', date('Y'))
             ->where('status','Closed')
            ->groupBy(DB::raw("Month(date)"))
            ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($months as $index => $month)
        {
            $datas[$month-1] = $appointmentss[$index];
        }

        //dd($appointmentss);
        //line graph datas
       /*$patientsrecord = Appointment::select(DB::raw("COUNT(*) as count"))
            ->whereYear('date', date('Y'))
            ->where('status', 'Scheduled')
            ->groupBy(DB::raw("Month(date)"))
            ->pluck('count');

        $monthss = Appointment::select(DB::raw("Month(date) as month"))
            ->whereYear('date', date('Y'))
            ->groupBy(DB::raw("Month(date)"))
            ->pluck('month');

        $linegraphdatas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach($monthss as $index1 => $month1)
        {
            $linegraphdatas[$month1] = $patientsrecord[$index1];
        }*/
        return view('dashboard.dashboard', compact('datas','users','medicines', 'supply', 'appointments'));
    }

   /* public $sources = [
            [
                'model' => '\\App\\Models\\Appointment',
                'date_field' => 'date',
                'field' => 'comments',
                'prefix' => '',
                'suffix' => '',
                'route' => 'appointment.edit',  
            ],
        ];*/
}
