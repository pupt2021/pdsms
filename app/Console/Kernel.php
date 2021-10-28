<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\Appointment;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        Commands\AppointmentToday::class,
        Commands\AppointmentTomorrow::class,
        Commands\ExpiredMedicine::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('appointment:today')->weekdays()->dailyAt('6:00')->when(function(){
            $t_a = Appointment::whereDate('date', DB::raw('CURDATE()'))
                ->where('status', 'Scheduled')->count();
            if($t_a != 0){
                return true;
            }   
        });

        $schedule->command('appointment:tomorrow')->weekdays()->dailyAt('6:00')->when(function(){
            $tom_a = Appointment::whereDate('date', DB::raw('CURDATE() + interval 1 day'))
                ->where('status', 'Scheduled')->count();
            if($tom_a != 0){
                return true;
            }   
        });

        $schedule->command('expired:medicine')->daily()->when(function(){
            $date_today = Carbon::now()->toDateString();
            $expired_medicine = Medicine::where('expiration_date',$date_today)->count();
                
            if($expired_medicine != 0){
                return true;
            }   
        });
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
