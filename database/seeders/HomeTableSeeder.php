<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class HomeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('homes')->insert([
           [
            'logo' => 'pdsms_site_logo.png',
            'banner1' => 'dms_for_page_banner1.jpg',
            'banneronetitle' => 'Modern Dentistry in a Calm and Relaxed Environment',
            'banneronedescription' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'banner2' => 'dms_for_page_banner2.jpg',
            'bannertwotitle' => 'Modern Achieve Your Desired Perfect Smile',
            'bannertwodescription' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'banner3' => 'dms_for_page_banner3.jpg',
            'bannerthreetitle' => 'Dentists Make Great Flossophers',
            'bannerthreedescription' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'gallerydesc' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'picture1' => 'gallery-1.jpg',
            'picture2' => 'gallery-2.jpg',
            'picture3' => 'gallery-3.jpg',
            'picture4' => 'gallery-4.jpg',
            'contactdesc' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'systemtitle' => 'PATIENT AND DENTAL SUPPLY MONITORING SYSTEM',
            'systemdescription' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'dentaltwitterlink' => '#',
            'dentalfblink' => '#',
            'dentalinstalink' => '#',
            'dentaladdress' => 'General Santos Avenue, Lower Bicutan, Taguig City',
            'dentalphone' => '12345678900',
            'dentalemail' => 'puptdental@gmail.com',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ],
        ]);
    }
}
