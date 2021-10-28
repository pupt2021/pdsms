<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ExpiredMedicineNotification;

class ExpiredMedicine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'expired:medicine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification to the user if there is an expired medicine';

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
        Notification::send($users, new ExpiredMedicineNotification);
        $this->info('Expired medicine notification has been sent successfully.');
    }
}
