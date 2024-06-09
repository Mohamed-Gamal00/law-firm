<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\BlogContent;
use App\Models\MainpageContent;
use App\Models\MediaCenter;
use App\Models\Post;
use App\Models\Service;
use App\Models\ServiceContent;
use App\Models\Setting;
use App\Models\Team;
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
        $services = Service::take(4)->get() ?? new Service();
        $teamContent = TeamContent::first() ?? new TeamContent();
        $teams = Team::take(4)->get() ?? new Team();
        $mediaCenterContent = MediaCenter::first() ?? new MediaCenter();
        $blogContent = BlogContent::first() ?? new BlogContent();
        $posts = Post::select('*')->take(4)->get() ?? new Post;

        // dd($mediaCenterContent);
        return view('website.home.index', compact('settings', 'maincontent', 'abotContent','serviceContent', 'services', 'teamContent', 'mediaCenterContent', 'blogContent', 'posts', 'teams'));
    }
}
