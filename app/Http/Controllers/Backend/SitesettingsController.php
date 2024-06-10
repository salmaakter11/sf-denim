<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SitesettingsController extends Controller
{
    public function Index(){
        return view('backend.site.site_index');
    } 
    public function Policy(){
        return view('backend.site.policy');
    } 
    public function Term(){
        return view('backend.site.term');
    } 
    public function Aboutus(){
        return view('backend.site.aboutus');
    }
}
