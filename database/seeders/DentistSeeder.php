<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DentistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('dentists')->insert([
           [
            'dentistbanner' => 'bg-1docnelson.jpg',
            'dentistbannertitle' => 'Well Experienced Dentists',
            'titletext' => 'Meet Our Experience Dentist',
            'shortdesc' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences.',
            'staff1image' => 'doc_nelson.jpg',
            'staff1name' => 'Nelson P. Angeles',
            'staff1position' => 'University Dentist',
            'staff1desc' => 'Far far away, behind the word mountains, far from the countries Vokalia',
            'staff1twitterlink' => '#',
            'staff1fblink' => '#',
            'staff1instalink' => '#',
            'staff1gmail' => '#',
            'staff2image' => 'doc_lim.jpg',
            'staff2name' => 'Ronilo I. Lim',
            'staff2position' => 'Dental Aide',
            'staff2desc' => 'Far far away, behind the word mountains, far from the countries Vokalia',
            'staff2twitterlink' => '#',
            'staff2fblink' => '#',
            'staff2instalink' => '#',
            'staff2gmail' => '#',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ],
        ]);
    }
}
