<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Service;
use App\Models\User;
use DB;
use Carbon\Carbon;

use App\Notifications\AppointmentTodayNotification;
use App\Notifications\AppointmentTomorrowNotification;
use Illuminate\Support\Facades\Notification;
class AppointmentController extends Controller
{
    //
    public function trashAppointment()
    {
        $trash_appointments = Appointment::onlyTrashed()->get();
        return view('appointment.trash-appointment',compact('trash_appointments'));
    }

    public function appointments(Request $request)
    {
        $dental_appointments = Appointment::all()->sortBy('date');
        $allAppointments = Appointment::count();
        $pendingAppointments = Appointment::where('status', 'Pending')->count();
        $scheduledAppointments = Appointment::where('status', 'Scheduled')->count();
        $closedAppointments = Appointment::where('status', 'Closed')->count();
        $rescheduleAppointments = Appointment::where('status', 'Reschedule')->count();
       
        //$ClosedApt = Appointment::where('status','Closed')->get();
        //$CloseApt->delete();
        //dd($ClosedApt);
       // $appointment_status = $dental_appointments->sortBy('status')->pluck('status')->unique();

       //gender formulas
       //$maleFaculty = Appointment::has('gender', 'Male')->withCount('patients')->get();
       //$a = Carbon::now()->month;
//Student
         $maleStudent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Student')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //
         $femaleStudent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Student')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            

//Administrator
         $maleAdmin = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Administrator')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

        $femaleAdmin = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Administrator')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });


//Faculty
         $maleFaculty = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Faculty')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

        $femaleFaculty = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Faculty')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

//Dependent
         $maleDependent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Dependent')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

        $femaleDependent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Dependent')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
/************Senior Citizen********/
//Student Senior
         $SeniormaleStudent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Student')
            ->where('patients.group_class','Senior Citizen')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //
         $SeniorfemaleStudent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Student')
            ->where('patients.group_class','Senior Citizen')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

//Administrator Senior
         $SeniormaleAdmin = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Administrator')
            ->where('patients.group_class','Senior Citizen')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

        $SeniorfemaleAdmin = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Administrator')
            ->where('patients.group_class','Senior Citizen')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });


//Faculty Senior
         $SeniormaleFaculty = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Faculty')
            ->where('patients.group_class','Senior Citizen')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

        $SeniorfemaleFaculty = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Faculty')
            ->where('patients.group_class','Senior Citizen')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

//Dependent Senior
         $SeniormaleDependent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Dependent')
            ->where('patients.group_class','Senior Citizen')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

        $SeniorfemaleDependent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Dependent')
            ->where('patients.group_class','Senior Citizen')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
/************PWD********/
//Student PWD
         $PWDmaleStudent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Student')
            ->where('patients.group_class','PWD')
            ->where('status','Closed')
            
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //->count();
            //->count();
          
            //
            //dd($PWDmaleStudent);
         $PWDfemaleStudent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Student')
            ->where('patients.group_class','PWD')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

//Administrator PWD
         $PWDmaleAdmin = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Administrator')
            ->where('patients.group_class','PWD')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

        $PWDfemaleAdmin = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Administrator')
            ->where('patients.group_class','PWD')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });


//Faculty Senior
         $PWDmaleFaculty = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Faculty')
            ->where('patients.group_class','PWD')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

        $PWDfemaleFaculty = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Faculty')
            ->where('patients.group_class','PWD')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

//Dependent PWD
         $PWDmaleDependent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Male')
            ->where('patients.patient_category','Dependent')
            ->where('patients.group_class','PWD')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

        $PWDfemaleDependent = DB::table('appointments')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.gender','Female')
            ->where('patients.patient_category','Dependent')
            ->where('patients.group_class','PWD')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from'), $request->get('to')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            


            //$totalMale = $maleStudent + $maleFaculty + $maleAdmin + $maleDependent;
            //$totalFemale = $femaleStudent + $femaleFaculty + $femaleAdmin + $femaleDependent;

            //service data
            //$dentalservices = Service::pluck('service');

/************************************************Student***************************************************************/
            //1
            //$services = DB::table('services')
            //->select('service')
            //->get();
            //foreach($services as $service)
            //dd($services);

            $cStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Consultation')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            
            //2
            $CwMStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Consultation with Medicine')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //3
            $CwPStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Consultation with Prescription')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //4
            $opStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Oral Prophylaxis')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //5
             $aStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Amalgam')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //6
            $compositeStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Composite')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //7
            $tfStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Temporary Filling')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //8
             $extractionStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Extraction')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //9
             $oStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Odontectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //10
             $fStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Frenectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

             //11
             $gStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Gingevectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //12
             $WsStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Wound Suturing')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //13
             $MbStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Maryland Bridge')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

             //14
             $SrStudent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Student')
            ->where('services.service','Suture Removal')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

/************************************************Faculty***************************************************************/
            //1
            $cFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Consultation')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //2
            $CwMFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Consultation with Medicine')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //3
            $CwPFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Consultation with Prescription')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //4
            $opFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Oral Prophylaxis')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //5
             $aFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Amalgam')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //6
            $compositeFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Composite')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //7
            $tfFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Temporary Filling')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //8
             $extractionFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Extraction')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //9
             $oFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Odontectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //10
             $fFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Frenectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

             //11
             $gFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Gingevectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //12
             $WsFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Wound Suturing')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //13
             $MbFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Maryland Bridge')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

             //14
             $SrFaculty = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Faculty')
            ->where('services.service','Suture Removal')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

/************************************************Administrator***************************************************************/
            //1
            $cAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Consultation')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //2
            $CwMAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Consultation with Medicine')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //3
            $CwPAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Consultation with Prescription')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //4
            $opAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Oral Prophylaxis')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //5
             $aAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Amalgam')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //6
            $compositeAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Composite')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //7
            $tfAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Temporary Filling')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //8
             $extractionAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Extraction')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //9
             $oAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Odontectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //10
             $fAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Frenectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
             //11
             $gAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Gingevectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //12
             $WsAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Wound Suturing')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //13
             $MbAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Maryland Bridge')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
             //14
             $SrAdministrator = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Administrator')
            ->where('services.service','Suture Removal')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

/************************************************Dependent***************************************************************/
            //1
            $cDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Consultation')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //2
            $CwMDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Consultation with Medicine')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //3
            $CwPDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Consultation with Prescription')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //4
            $opDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Oral Prophylaxis')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //5
             $aDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Amalgam')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //6
            $compositeDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Composite')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //7
            $tfDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Temporary Filling')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //8
             $extractionDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Extraction')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //9
             $oDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Odontectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //10
             $fDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Frenectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
             //11
             $gDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Gingevectomy')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //12
             $WsDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Wound Suturing')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
            //13
             $MbDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Maryland Bridge')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });
             //14
             $SrDependent = DB::table('appointments')
            ->join('services','services.id', '=','appointments.service_id')
            ->join('patients','patients.id', '=','appointments.patient_id')
            ->select('appointments.*','patients.*')
            ->where('patients.patient_category','Dependent')
            ->where('services.service','Suture Removal')
            ->where('status','Closed')
            ->whereBetween('date', [$request->get('from1'), $request->get('to1')])
            ->get()
            ->groupBy(function($data) {
                return $data->patient_id;
            });

            //Total
           /* $cTotal = $cStudent + $cAdministrator + $cFaculty + $cDependent;
            $CwMTotal = $CwMStudent + $CwMAdministrator + $CwMFaculty + $CwMDependent;
            $CwPTotal = $CwPStudent + $CwPAdministrator + $CwPFaculty + $CwPDependent;
            $opTotal = $opStudent + $opAdministrator + $opFaculty + $opDependent;
            $aTotal = $aStudent + $aAdministrator + $aFaculty + $aDependent;
            $compositeTotal = $compositeStudent + $compositeAdministrator + $compositeFaculty + $compositeDependent;
            $tfTotal = $tfStudent + $tfAdministrator + $tfFaculty + $tfDependent;
            $extractionTotal = $extractionStudent + $extractionAdministrator + $extractionFaculty + $extractionDependent;
            $oTotal = $oStudent + $oAdministrator + $oFaculty + $oDependent;
            $fTotal = $fStudent + $fAdministrator + $fFaculty + $fDependent;
            $gTotal = $gStudent + $gAdministrator + $gFaculty + $gDependent;
            $WsTotal = $WsStudent + $WsAdministrator + $WsFaculty + $WsDependent;
            $MbTotal = $MbStudent + $MbAdministrator + $MbFaculty + $MbDependent;
            $SrTotal = $SrStudent + $SrAdministrator + $SrFaculty + $SrDependent;*/

           /* $overAllServiceStudent = $cStudent + $CwMStudent + $CwPStudent + $opStudent + $aStudent + $compositeStudent + $tfStudent + $extractionStudent + $oStudent + $fStudent + $gStudent + $WsStudent + $MbStudent + $SrStudent;
            $overAllServiceAdministrator = $cAdministrator + $CwMAdministrator + $CwPAdministrator + $opAdministrator + $aAdministrator + $compositeAdministrator + $tfAdministrator + $extractionAdministrator + $oAdministrator + $fAdministrator + $gAdministrator + $WsAdministrator + $MbAdministrator + $SrAdministrator;
            $overAllServiceFaculty = $cFaculty + $CwMFaculty + $CwPFaculty + $opFaculty + $aFaculty + $compositeFaculty + $tfFaculty + $extractionFaculty + $oFaculty + $fFaculty + $gFaculty + $WsFaculty + $MbFaculty + $SrFaculty;
            $overAllServiceDependent = $cDependent + $CwMDependent + $CwPDependent + $opDependent + $aDependent + $compositeDependent + $tfDependent + $extractionDependent + $oDependent + $fDependent + $gDependent + $WsDependent + $MbDependent + $SrDependent;
            $overAllTotalService = $cTotal + $CwMTotal + $CwPTotal + $opTotal + $aTotal + $compositeTotal + $tfTotal + $extractionTotal + $oTotal + $fTotal + $gTotal + $WsTotal + $MbTotal + $SrTotal;*/
            //dd($consultationStudent);
            //$dentalservices->collect();
            //dd($dentalservices);
            //dd($totalMale);

            //->where(Carbon::parse('date')->format('M'),Carbon::now()->month)
            //->whereMonth('date', date('m'))
            //->whereYear('date', date('Y'))
           
            //dd($maleFaculty);   
            //$b = Appointment::whereMonth('date', Carbon::now()->month)->get();
             //dd($b);

            //$a = Carbon::now()->month;
            //dd($a);
            //with('patient')->having('gender','Male')->get();
        //$mf = $maleFaculty->where('status','Pending')->count();
        //->where('gender','Male')->where('patient_category','Student')->count();
        //select(DB::raw("COUNT(id) as count"),DB::raw("DATE_FORMAT(created_at, '%m-%Y') new_date"),  DB::raw('YEAR(created_at) year, MONTH(created_at) month'))
        //->where('gender','Male')
        //->where('patient_category', 'Faculty')
        //->where('gender','Male')->where('patient_category','Faculty')->get()
          //->groupBy('month','year')
          //->pluck('count');
          //->groupBy(function($val) {
          //return Carbon::parse($val->created_at)->format('m');
          //});
          //$mF = $maleFaculty->where('gender','Male')->where('patient_category','Student')->count();
          
         //$maleAdmin = Patient::select()
        //->where('gender','Male')
       // ->where('patient_category', 'Admin')->get();
       

        return view('appointment.all-appointment',compact('dental_appointments','allAppointments',
        'pendingAppointments','scheduledAppointments','closedAppointments','rescheduleAppointments',
        'maleStudent','femaleStudent','maleAdmin','femaleAdmin','maleFaculty','femaleFaculty','maleDependent',
        'femaleDependent','SeniormaleStudent','SeniorfemaleStudent','SeniormaleAdmin','SeniorfemaleAdmin',
        'SeniormaleFaculty','SeniorfemaleFaculty','SeniormaleDependent','SeniorfemaleDependent','PWDmaleStudent',
        'PWDfemaleStudent','PWDmaleAdmin','PWDfemaleAdmin','PWDmaleFaculty','PWDfemaleFaculty','PWDmaleDependent',
        'PWDfemaleDependent', 'cStudent','CwMStudent', 'CwPStudent','opStudent',
        'aStudent','compositeStudent','tfStudent','extractionStudent','oStudent','fStudent','gStudent',
        'WsStudent','MbStudent','SrStudent','cFaculty','CwMFaculty','CwPFaculty','opFaculty','aFaculty',
        'compositeFaculty','tfFaculty','extractionFaculty','oFaculty','fFaculty','gFaculty','WsFaculty',
        'MbFaculty','SrFaculty','cAdministrator','CwMAdministrator','CwPAdministrator','opAdministrator',
        'aAdministrator','compositeAdministrator','tfAdministrator','extractionAdministrator','oAdministrator',
        'fAdministrator','gAdministrator','WsAdministrator','MbAdministrator','SrAdministrator','cDependent',
        'CwMDependent','CwPDependent','opDependent','aDependent','compositeDependent','tfDependent','extractionDependent',
        'oDependent','fDependent','gDependent','WsDependent','MbDependent','SrDependent'//,'cTotal','CwMTotal','CwPTotal',
        //'opTotal','aTotal','compositeTotal','tfTotal','extractionTotal','oTotal','fTotal','gTotal','WsTotal','MbTotal',
        //'SrTotal','overAllServiceStudent','overAllServiceAdministrator','overAllServiceFaculty','overAllServiceDependent',
        //'overAllTotalService'
         ));
       
    }

     public function addAppointment()
    {
        $dentalservices = Service::all();
        $patients = Patient::all();
        return view('appointment.add-appointment',compact('patients','dentalservices'));
    }

    public function storeAppointment(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'time' => 'required',
            'patient_id' => 'required',
            'service_id' => 'required',
            //'status' => 'required',
        ]);

        $patient_id = $request->get('patient_id');
        $service_id = $request->get('service_id');
        $date = $request->date;
        $time = $request->time;
        //$status = $request->status;
        $description = $request->description;

        $appointment = new Appointment();
        $appointment->patient_id = $patient_id;
        $appointment->service_id = $service_id;
        $appointment->date = $date;
        $appointment->time = $time;
        $appointment->description = $description;
        //$appointment->status = $status;
        $appointment->save();
        return back()->with('appointment_added','Appointment record has been inserted');
    }

    public function editAppointment($id)
    {
      $appointment = Appointment::find($id);
      $patients = Patient::all();
      $dentalservices = Service::all();
      return view('appointment.edit-appointment',compact('appointment','patients','dentalservices'));
    }

    public function updateAppointment(Request $request)
    {
       $request->validate([
            //'patient_id' => 'required',
            'service_id' => 'required',
            //'date' => 'nullable',
            'time' => 'required',
            //'status' => 'required',
        ]);

        $appointment = Appointment::find($request->id);

        //$patient_id = $request->get('patient_id');
        
            $service_id = $request->get('service_id');
            $time = $request->time;
        
        
        $date = $request->date;
        
        $status = $request->status;
        $description = $request->description;

        //$appointment->patient_id = $patient_id;
        $appointment->service_id = $service_id;
        $appointment->date = $date;
        $appointment->time = $time;
        $appointment->description = $description;
        $appointment->status = $status;
        $appointment->save();
        return back()->with('appointment_updated','Appointment information updated successfully!');
    }

    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);
        $appointment->delete();
        //return back()->with('appointment_deleted','Appointment deleted successfully!');
        return response()->json(['status'=>'Appointment record deleted successfully!']);
    }

    public function restoreAppointment($id)
    {
        $restore = Appointment::withTrashed()->find($id);
        $restore->restore();
        //return back()->with('appointment_restored','Appointment has been restored successfully!');
        return response()->json(['status'=>'Appointment record restored successfully!']);
    }

    //search appointment from month to month
    public function searchAppointment(Request $request)
    {
        /*$request->validate([
            'fromDate' => 'required',
            'toDate' => 'required',
        ]);

        $fDate = $request->fromDate;
        $tDate = $request->toDate;

        $fromDate = $fDate;
        $toDate = $tDate;*/
        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $search = Appointment::select()
           ->where('date','>=', $fromDate)
           ->where('date', '<=', $toDate)
           ->get();

        $dental_appointments = Appointment::all();
        $allAppointments = Appointment::count();
        $pendingAppointments = Appointment::where('status', 'Pending')->count();
        $scheduledAppointments = Appointment::where('status', 'Scheduled')->count();
        $closedAppointments = Appointment::where('status', 'Closed')->count();
        $rescheduleAppointments = Appointment::where('status', 'Reschedule')->count();

        return view('appointment.all-appointment', compact('search','dental_appointments','allAppointments','pendingAppointments','scheduledAppointments','closedAppointments','rescheduleAppointments'));
    }

    public function todaysAppointment()
    {
       
       $t_a = Appointment::whereDate('date', DB::raw('CURDATE()'));
      
       if($t_a)
        {
             $todays_appointment = Appointment::whereDate('date', DB::raw('CURDATE()'))
                        ->where('status', 'Scheduled')
                        ->get();
                        
             //Notification::send($users, new AppointmentTodayNotification($todays_appointment));
             //User::find(1)->notify(new AppointmentNotification);
        }

        return view('appointment.today-appointment', compact('todays_appointment'));
    }

     public function tomorrowsAppointment()
    {
     //$users = User::all();
         $tom_a = Appointment::whereDate('date', DB::raw('CURDATE() + interval 1 day'));
        if($tom_a)
        {
            $tomorrows_appointment = Appointment::whereDate('date', DB::raw('CURDATE() + interval 1 day'))
                        ->where('status', 'Scheduled')
                        ->get();
          // Notification::send($users, new AppointmentTomorrowNotification);
        }

        return view('appointment.tomorrow-appointment', compact('tomorrows_appointment'));
    }

    public function appointmentDetails($id){
      
        return Appointment::with('patient','service')->findOrFail($id);
    }

}
