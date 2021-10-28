<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Announcement;
use App\Models\Dentist;
use App\Models\SiteService;
use App\Models\About;
use App\Models\Home;

class SiteSettingsController extends Controller
{
    //
    public function homeWebsite()
    {
        $homes = Home::all();

        return view('website.index',compact('homes'));
    }

    public function editHome($id)
    {
        $home = Home::find($id);
        return view('system_settings.homesetting', compact('home'));
    }

    public function updateHome(Request $request)
    {
        $request->validate([
            'banneronetitle' => 'required',
            'banneronedescription' => 'required',
            'bannertwotitle' => 'required',
            'bannertwodescription' => 'required',
            'bannerthreetitle' => 'required',
            'bannerthreedescription' => 'required',
            'gallerydesc' => 'required',
            'contactdesc' => 'required',
            'systemtitle' => 'required',
            'systemdescription' => 'required',
            'dentaladdress' => 'required',
            'dentalphone' => 'required',
            'dentalemail' => 'required',
        ]);

        $home = Home::find($request->id);
        if($request->hasFile('logo'))
        {
            $request->validate([
                'logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image = $request->file('logo');
            $imageLogo = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageLogo);
            $home->logo = $imageLogo;
        }
        if($request->hasFile('banner1'))
        {
            $request->validate([
                'banner1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image1 = $request->file('banner1');
            $imageBanner1 = time().'.'.$image1->extension();
            $image1->move(public_path('images'),$imageBanner1);
            $home->banner1 = $imageBanner1;
        }
        if($request->hasFile('banner2'))
        {
            $request->validate([
                'banner2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image2 = $request->file('banner2');
            $imageBanner2 = time().'.'.$image2->extension();
            $image2->move(public_path('images'),$imageBanner2);
            $home->banner2 = $imageBanner2;
        }
        if($request->hasFile('banner3'))
        {
            $request->validate([
                'banner3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image3 = $request->file('banner3');
            $imageBanner3 = time().'.'.$image3->extension();
            $image3->move(public_path('images'),$imageBanner3);
            $home->banner3 = $imageBanner3;
        }
        if($request->hasFile('picture1'))
        {
            $request->validate([
                'picture1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image4 = $request->file('picture1');
            $imagePicture1 = time().'.'.$image4->extension();
            $image4->move(public_path('images'),$imagePicture1);
            $home->picture1 = $imagePicture1;
        }
        if($request->hasFile('picture1'))
        {
            $request->validate([
                'picture1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image5 = $request->file('picture1');
            $imagePicture1 = time().'.'.$image5->extension();
            $image5->move(public_path('images'),$imagePicture1);
            $home->picture1 = $imagePicture1;
        }
        if($request->hasFile('picture2'))
        {
            $request->validate([
                'picture2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image6 = $request->file('picture2');
            $imagePicture2 = time().'.'.$image6->extension();
            $image6->move(public_path('images'),$imagePicture2);
            $home->picture1 = $imagePicture2;
        }
        if($request->hasFile('picture3'))
        {
            $request->validate([
                'picture3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image7 = $request->file('picture3');
            $imagePicture3 = time().'.'.$image7->extension();
            $image7->move(public_path('images'),$imagePicture3);
            $home->picture3 = $imagePicture3;
        }
        if($request->hasFile('picture4'))
        {
            $request->validate([
                'picture4' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image8 = $request->file('picture4');
            $imagePicture4 = time().'.'.$image8->extension();
            $image8->move(public_path('images'),$imagePicture4);
            $home->picture4 = $imagePicture4;
        }
        
        $banner_one_title  = $request->banneronetitle;
        $banner_one_description = $request->banneronedescription;
        $banner_two_title = $request->bannertwotitle;
        $banner_two_description = $request->bannertwodescription;
        $banner_three__title = $request->bannerthreetitle;
        $banner_three_description = $request->bannerthreedescription;
        $gallery_desc = $request->gallerydesc;
        $contact_desc = $request->contactdesc;
        $system_title_ = $request->systemtitle;
        $system_description = $request->systemdescription;
        $dtl = $request->dentaltwitterlink;
        $dfk = $request->dentalfblink;
        $dil = $request->dentalinstalink;
        $dental_address = $request->dentaladdress;
        $dental_phone = $request->dentalphone;
        $dental_email = $request->dentalemail;
       

        $home->banneronetitle = $banner_one_title;
        $home->banneronedescription = $banner_one_description;
        $home->bannertwotitle = $banner_two_title;
        $home->bannertwodescription = $banner_two_description;
        $home->bannerthreetitle = $banner_three__title;
        $home->bannerthreedescription = $banner_three_description;
        $home->gallerydesc = $gallery_desc;
        $home->contactdesc = $contact_desc;
        $home->systemtitle = $system_title_;
        $home->systemdescription = $system_description;
        $home->dentaltwitterlink = $dtl;
        $home->dentalfblink = $dfk;
        $home->dentalinstalink = $dil;
        $home->dentaladdress = $dental_address;
        $home->dentalphone = $dental_phone;
        $home->dentalemail = $dental_email;
        $home->save();
        return back()->with('home_updated','Home section updated successfully!');
    }   

    function aboutsetting()
    {
        return view('system_settings.aboutsetting');
    }

    public function aboutWebsite()
    {
        $abouts = About::all();
        return view('website.about',compact('abouts'));
    }

    function editAbout($id)
    {
        $about = About::find($id);
        return view('system_settings.aboutsetting', compact('about'));
    }

     public function updateAbout(Request $request)
    {
        $request->validate([
            'visiontitle' => 'required',
            'visionprgph1' => 'required',
            'missiontitle' => 'required',
            'missionprgph1' => 'required',
            'goaltitle' => 'required',
            'goalprgph1' => 'required',
            'maintitle' => 'required',
            'maintitledescription' => 'required',
            'weddesc' => 'required',
            'cfdescription' => 'required',
            'ccdesc' => 'required',
            'happydesc' => 'required',
            'achievementdesc' => 'required',
            'yearsofexp' => 'required',
            'hscustomer' => 'required',
            'patientsperyear' => 'required',
        ]);

        $about = About::find($request->id);
        if($request->hasFile('aboutbanner'))
        {
            $request->validate([
                'aboutbanner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image = $request->file('aboutbanner');
            $imageAboutBanner = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageAboutBanner);
            $about->aboutbanner = $imageAboutBanner;
        }
        if($request->hasFile('vmgpicture'))
        {
            $request->validate([
                'vmgpicture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image1 = $request->file('vmgpicture');
            $imageVMG = time().'.'.$image1->extension();
            $image1->move(public_path('images'),$imageVMG);
            $about->vmgpicture = $imageVMG;
        }
        if($request->hasFile('picture'))
        {
            $request->validate([
                'picture' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image2 = $request->file('picture');
            $imagePicture = time().'.'.$image2->extension();
            $image2->move(public_path('images'),$imagePicture);
            $about->picture = $imagePicture;
        }
        if($request->hasFile('achievementbg'))
        {
            $request->validate([
                'achievementbg' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image3 = $request->file('aboutbanner');
            $imageAchievementbg = time().'.'.$image3->extension();
            $image3->move(public_path('images'),$imageAchievementbg);
            $about->achievementbg = $imageAchievementbg;
        }
        
        $vision_title  = $request->visiontitle;
        $vision_par1 = $request->visionprgph1;
        $vision_par2 = $request->visionprgph2;
        $mission_title = $request->missiontitle;
        $mission_par1 = $request->missionprgph1;
        $mission_par2 = $request->missionprgph2;
        $goal_title = $request->goaltitle;
        $goal_par1 = $request->goalprgph1;
        $goal_par2 = $request->goalprgph2;
        $main_title = $request->maintitle;
        $mtd = $request->maintitledescription;
        $weddesc = $request->weddesc;
        $cfdescription = $request->cfdescription;
        $ccdesc = $request->ccdesc;
        $happydesc = $request->happydesc;
        $achievementdesc = $request->achievementdesc;
        $yearsofexp = $request->yearsofexp;
        $hscustomer = $request->hscustomer;
        $patientsperyear = $request->patientsperyear;
       

        $about->visiontitle = $vision_title ;
        $about->visionprgph1 = $vision_par1;
        $about->visionprgph2 = $vision_par2;
        $about->missiontitle = $mission_title;
        $about->missionprgph1 = $mission_par1;
        $about->missionprgph2 = $mission_par2;
        $about->goaltitle = $goal_title;
        $about->goalprgph1 = $goal_par1;
        $about->goalprgph2 = $goal_par2;
        $about->maintitle = $main_title;
        $about->maintitledescription = $mtd;
        $about->weddesc = $weddesc;
        $about->cfdescription = $cfdescription;
        $about->ccdesc = $ccdesc;
        $about->happydesc = $happydesc;
        $about->achievementdesc = $achievementdesc;
        $about->yearsofexp = $yearsofexp;
        $about->hscustomer = $hscustomer;
        $about->patientsperyear = $patientsperyear;
        $about->save();
        return back()->with('about_updated','About section updated successfully!');
    }

    public function serviceWebsite()
    {
        $services = SiteService::all();
        return view('website.services',compact('services'));
    }

    function editService($id)
    {
        $service = SiteService::find($id);
        return view('system_settings.servicesetting', compact('service'));
    }

     public function updateService(Request $request)
    {
        $request->validate([
            'servicebannertitle' => 'required',
            'servicetitle' => 'required',
            'servicedescription' => 'required',
            'twdesc' => 'required',
            'tcdesc' => 'required',
            'qbdesc' => 'required',
            'madesc' => 'required',
            'dcdesc' => 'required',
            'didesc' => 'required',
            'tbdesc' => 'required',
        ]);

        $service = SiteService::find($request->id);
        if($request->hasFile('servicebanner'))
        {
            $request->validate([
                'servicebanner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image = $request->file('servicebanner');
            $imageServiceBanner = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageServiceBanner);
            $service->servicebanner = $imageServiceBanner;
        }
        
        $service_banner_title  = $request->servicebannertitle;
        $service_title = $request->servicetitle;
        $service_description = $request->servicedescription;
        $twdesc = $request->twdesc;
        $tcdesc = $request->tcdesc;
        $qbdesc = $request->qbdesc;
        $madesc = $request->madesc;
        $dcdesc = $request->dcdesc;
        $didesc = $request->didesc;
        $tbdesc = $request->tbdesc;
       

        $service->servicebannertitle = $service_banner_title ;
        $service->servicetitle = $service_title;
        $service->servicedescription = $service_description;
        $service->twdesc = $twdesc;
        $service->tcdesc = $tcdesc;
        $service->qbdesc = $qbdesc;
        $service->madesc = $madesc;
        $service->dcdesc = $dcdesc;
        $service->didesc = $didesc;
        $service->tbdesc = $tbdesc;
        $service->save();
        return back()->with('service_updated','Service section updated successfully!');
    }  

    public function dentistWebsite()
    {
        $dentists = Dentist::all();
        return view('website.dentists',compact('dentists'));
    }

    function editDentist($id)
    {
        $dentist = Dentist::find($id);
        return view('system_settings.dentistsetting', compact('dentist'));
    }

     public function updateDentist(Request $request)
    {
        $request->validate([
            'dentistbannertitle' => 'required',
            'titletext' => 'required',
            'shortdesc' => 'required',
            'staff1name' => 'required',
            'staff1position' => 'required',
            'staff1desc' => 'required',
            'staff2name' => 'required',
            'staff2position' => 'required',
            'staff2desc' => 'required',
        ]);

        $dentist = Dentist::find($request->id);
        if($request->hasFile('dentistbanner'))
        {
            $request->validate([
                'dentistbanner' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image = $request->file('dentistbanner');
            $imageDentistBanner = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageDentistBanner);
            $dentist->dentistbanner = $imageDentistBanner;
        }
        if($request->hasFile('staff1image'))
        {
            $request->validate([
                'staff1image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image1 = $request->file('staff1image');
            $imageStaff1 = time().'.'.$image1->extension();
            $image1->move(public_path('images'),$imageStaff1);
            $dentist->staff1image = $imageStaff1;
        }
        if($request->hasFile('staff2image'))
        {
            $request->validate([
                'staff2image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image2 = $request->file('staff2image');
            $imageStaff2 = time().'.'.$image2->extension();
            $image2->move(public_path('images'),$imageStaff2);
            $dentist->staff2image = $imageStaff2;
        }

        $dentist_banner_title  = $request->dentistbannertitle;
        $title_text = $request->titletext;
        $short_desc = $request->shortdesc;
        $staff_1_name = $request->staff1name;
        $staff_1_position = $request->staff1position;
        $staff_1_desc = $request->staff1desc;
        $staff_2_name = $request->staff2name;
        $staff_2_position = $request->staff2position;
        $staff_2_desc = $request->staff2desc;
        $staff_1_twitter = $request->staff1twitterlink;
        $staff_1_fb = $request->staff1fblink;
        $staff_1_insta = $request->staff1instalink;
        $staff_1_gmail = $request->staff1gmail;
        $staff_2_twitter = $request->staff2twitterlink;
        $staff_2_fb = $request->staff2fblink;
        $staff_2_insta = $request->staff2instalink;
        $staff_2_gmail = $request->staff2gmail;
       

        $dentist->dentistbannertitle = $dentist_banner_title ;
        $dentist->titletext = $title_text;
        $dentist->shortdesc = $short_desc;
        $dentist->staff1name = $staff_1_name;
        $dentist->staff1position = $staff_1_position;
        $dentist->staff1desc = $staff_1_desc;
        $dentist->staff2name = $staff_2_name;
        $dentist->staff2position = $staff_2_position;
        $dentist->staff2desc = $staff_2_desc;
        $dentist->staff1twitterlink = $staff_1_twitter;
        $dentist->staff1fblink = $staff_1_fb;
        $dentist->staff1instalink = $staff_1_insta;
        $dentist->staff1gmail = $staff_1_gmail;
        $dentist->staff2twitterlink = $staff_2_twitter;
        $dentist->staff2fblink = $staff_2_fb;
        $dentist->staff2instalink = $staff_2_insta;
        $dentist->staff2gmail = $staff_2_gmail;
        $dentist->save();
        return back()->with('dentist_updated','Dentist section updated successfully!');
    }  

    public function announcementWebsite()
    {
        $announcements = Announcement::all();
        return view('website.announcement',compact('announcements'));
    }

    public function editAnnouncement($id)
    {
      $announcement = Announcement::find($id);
      return view('system_settings.announcementsetting',compact('announcement'));
    }

    public function updateAnnouncement(Request $request)
    {
        $request->validate([
            'announcementtitle' => 'required',
            'announcementdescription' => 'required',
        ]);

        $announcement = Announcement::find($request->id);
        if($request->hasFile('announcement1'))
        {
            $request->validate([
                'announcement1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image = $request->file('announcement1');
            $imageAnnouncement1 = time().'.'.$image->extension();
            $image->move(public_path('images'),$imageAnnouncement1);
            $announcement->announcement1 = $imageAnnouncement1;
        }
        if($request->hasFile('announcement2'))
        {
            $request->validate([
                'announcement2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image1 = $request->file('announcement2');
            $imageAnnouncement2 = time().'.'.$image1->extension();
            $image1->move(public_path('images'),$imageAnnouncement2);
            $announcement->announcement2 = $imageAnnouncement2;
        }
        if($request->hasFile('announcement3'))
        {
            $request->validate([
                'announcement3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:5000',
            ]);
            $image2 = $request->file('announcement3');
            $imageAnnouncement3 = time().'.'.$image2->extension();
            $image2->move(public_path('images'),$imageAnnouncement3);
            $announcement->announcement3 = $imageAnnouncement3;
        }

        $announcement_title = $request->announcementtitle;
        $announcement_description = $request->announcementdescription;
       

        $announcement->announcementtitle = $announcement_title;
        $announcement->announcementdescription = $announcement_description;
        $announcement->save();
        return back()->with('announcement_updated','Announcement details updated successfully!');
    }
}
