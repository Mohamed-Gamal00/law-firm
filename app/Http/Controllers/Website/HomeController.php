<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BlogContent;
use App\Models\MainpageContent;
use App\Models\MediaCenter;
use App\Models\ServiceContent;
use App\Models\Setting;
use App\Models\TeamContent;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $settings = Setting::first() ?? new Setting();
        $maincontent = MainpageContent::all() ?? new MainpageContent();
        $abotContent = About::first() ?? new About();
        $serviceContent = ServiceContent::first() ?? new ServiceContent();
        $teamContent = TeamContent::first() ?? new TeamContent();
        $mediaCenterContent = MediaCenter::first() ?? new MediaCenter();
        $blogContent = BlogContent::first() ?? new BlogContent();
        // dd($mediaCenterContent);
        return view('website.home.index', compact('settings', 'maincontent', 'abotContent','serviceContent', 'teamContent', 'mediaCenterContent', 'blogContent'));
    }
}
