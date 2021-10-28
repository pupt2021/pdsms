<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('abouts')->insert([
           [
            'aboutbanner' => 'bg-1docnelson.jpg',
            'vmgpicture' => 'about.jpg',
            'visiontitle' => 'We Offer High Quality Services',
            'visionprgph1' => 'The Polytechnic University of the Philippines Taguig Clinic aims to provide prompt, efficient and quality health care services to students, school personnel and its adopted community. It strives in providing holistic medical and dental care that will facilitate mental, physical and emotional development of every students and employees.',
            'visionprgph2' => 'The school clinic also endeavors in participating actively in activities and programs which will promote and improve the health of the community.',
            'missiontitle' => 'To Accomodate All Patients',
            'missionprgph1' => 'In line with the mission of Polytechnic University of the Philippines to educate the mind, body and soul, the mission of the campus clinic is to assure that the health of the students is at optimum condition for learning.',
            'missionprgph2' => 'The campus clinic also provides health services to the institutions faculty and administrative staff so that effective service would be delivered to the student body.',
            'goaltitle' => 'Help Our Customers Needs',
            'goalprgph1' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean.',
            'goalprgph2' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt voluptate, quibusdam sunt iste dolores consequatur',
            'picture' => 'doc_nelson.jpg',
            'maintitle' => 'PDSMS with a personal touch',
            'maintitledescription' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'weddesc' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'cfdescription' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'ccdesc' => 'Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.',
            'happydesc' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'achievementbg' => 'bg-1docnelson.jpg',
            'achievementdesc' => 'A small river named Duden flows by their place and supplies it with the necessary regelialia.',
            'yearsofexp' => '12',
            'hscustomer' => '7890',
            'patientsperyear' => '888',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
           ],
        ]);
    }
}
