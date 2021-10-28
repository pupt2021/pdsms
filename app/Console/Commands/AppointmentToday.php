<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Notifications\AppointmentTodayNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Appointment;
use Illuminate\Support\Facades\DB;

class AppointmentToday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointment:today';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications to the users if the there is an appointment for the day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //return 0;
       
       /*$t_a = Appointment::whereDate('date', DB::raw('CURDATE()'))
                ->where('status', 'Scheduled')
                ->get();
       
       if($t_a)
        {
             Appointment::whereDate('date', DB::raw('CURDATE()'))
                        ->where('status', 'Scheduled')
                        ->get();
             
            // Notification::send($users, new AppointmentTodayNotification);
        }
        //$users = User::all();
        Appointment::whereDate('date', DB::raw('CURDATE()'))
                        ->where('status', 'Scheduled')
                        ->get();*/
        $users = User::all();
        Notification::send($users, new AppointmentTodayNotification);
        $this->info('Appointment notification for today has been sent successfully.');
    }
}
