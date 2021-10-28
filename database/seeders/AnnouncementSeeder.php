<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('announcements')->insert([
           [
            'announcement1' => 'dms_for_page_banner1.jpg',
            'announcement2' => 'dms_for_page_banner2.jpg',
            'announcement3' => 'dms_for_page_banner3.jpg',
            'announcementtitle' => 'Announcement Title!',
            'announcementdescription' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ],
        ]);
    }
}
