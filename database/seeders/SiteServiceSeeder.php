<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SiteServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('site_services')->insert([
           [
            'servicebanner' => 'bg-1docnelson.jpg',
            'servicebannertitle' => 'Our Service Keeps you Smile',
            'servicetitle' => 'Our Service Keeps you Smile',
            'servicedescription' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'twdesc' => 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.',
            'tcdesc' => 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.',
            'qbdesc' => 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.',
            'madesc' => 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.',
            'dcdesc' => 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.',
            'didesc' => 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.',
            'tbdesc' => 'Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ],
        ]);
    }
}
