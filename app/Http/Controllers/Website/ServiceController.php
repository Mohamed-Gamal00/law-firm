<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MediaCenter;
use App\Models\ServiceContent;
use App\Models\Setting;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $settings = Setting::first() ?? new Setting();
        $serviceContent = ServiceContent::first() ?? new ServiceContent();
        $mediaCenterContent = MediaCenter::first() ?? new MediaCenter();
        return view('website.services.index', compact('settings', 'serviceContent', 'mediaCenterContent'));
    }
}
