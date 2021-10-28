<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $services = [
           'Consultation',
           'Consultation with Medicine',
           'Consultation with Prescription',
           'Oral Prophylaxis',
           'Amalgam',
           'Composite',
           'Temporary Filling',
           'Extraction',
           'Odontectomy',
           'Frenectomy',
           'Gingevectomy',
           'Wound Suturing',
           'Maryland Bridge',
           'Suture Removal',
        ];
     
        foreach ($services as $service) {
             Service::create(['service' => $service]);
        }
    }
}
