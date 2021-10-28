<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WebsiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $this->call([
           
            AboutSeeder::class,
            AnnouncementSeeder::class,
            DentistSeeder::class,
            SiteServiceSeeder::class,
            HomeTableSeeder::class,
           
        ]);
    }
}
