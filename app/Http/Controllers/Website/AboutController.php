<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\CustomerOpinion;
use App\Models\MediaCenter;
use App\Models\Setting;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $settings = Setting::first() ?? new Setting();
        $abotContent = About::first() ?? new About();
        $customerOpinions = CustomerOpinion::all() ?? new CustomerOpinion;
        // dd($customerOpinions);
        return view('website.about-us.index', compact('settings', 'abotContent', 'customerOpinions'));
    }
}
