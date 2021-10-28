<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Supply;
use App\Models\Medicine;
use App\Observers\SupplyObserver;
use App\Observers\MedicineObserver;
use App\Observers\AppointmentObserver;
use App\Models\Appointment;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        View::share('homes',\App\Models\Home::all());
        View::share('abouts',\App\Models\About::all());
        View::share('services',\App\Models\SiteService::all());
        View::share('dentists',\App\Models\Dentist::all());
        View::share('announcements',\App\Models\Announcement::all());

        //View::share('users',\App\Models\User::all()->count());
        //View::share('patients',\App\Models\Patient::all());
        //View::share('appointments',\App\Models\Appointment::all()->count());
        //View::share('dentalservices',\App\Models\Service::all());
        //View::share('medicines',\App\Models\Medicine::all()->count());
        //View::share('supply',\App\Models\Supply::all()->count());

        Supply::observe(SupplyObserver::class);
        Medicine::observe(MedicineObserver::class);
        Appointment::observe(AppointmentObserver::class);
    }
}
