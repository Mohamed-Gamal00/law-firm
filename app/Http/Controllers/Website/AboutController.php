<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutFeature;
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
        $aboutFeatuers = AboutFeature::all() ?? new AboutFeature();
        $customerOpinions = CustomerOpinion::all() ?? new CustomerOpinion;
        $image_section = CustomerOpinion::select('image_section')->whereNotNull('image_section')->first() ?? new CustomerOpinion();
        // dd($abotContent);
        return view('website.about-us.index', compact('settings', 'abotContent', 'customerOpinions','image_section','aboutFeatuers'));
    }
}
