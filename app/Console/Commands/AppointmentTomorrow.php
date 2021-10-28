<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AppointmentTomorrowNotification;
use App\Models\User;

class AppointmentTomorrow extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointment:tomorrow';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notifications to the users if the there is an appointment for the tomorrow';

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
        $users = User::all();
        Notification::send($users, new AppointmentTomorrowNotification);
        $this->info('Appointment notification for tomorrow has been sent successfully.');
    }
}
