<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GeneralSettings extends Controller
{
    public function BannerIndex(){
        return view('backend.general_settings.banner');
    }
    public function StoryIndex(){
        return view('backend.general_settings.story');
    }
    public function ClientIndex(){
        return view('backend.general_settings.client');
    }
    public function PurposeIndex(){
        return view('backend.general_settings.purpose');
    }
    public function PeopleIndex(){
        return view('backend.general_settings.people');
    }
    public function SustailabilityIndex(){
        return view('backend.general_settings.sustailability');
    }
    public function FacilityIndex(){
        return view('backend.general_settings.facility');
    }
    public function ContactIndex(){
        return view('backend.general_settings.contact');
    }
    public function CareerIndex(){
        return view('backend.general_settings.career');
    }
    public function GalleryIndex(){
        return view('backend.general_settings.gallery');
    }
}
