<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\MediaCenter;
use App\Models\Service;
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
        $services = Service::all() ?? new Service();
        // dd($services);
        return view('website.services.index', compact('settings', 'serviceContent', 'mediaCenterContent', 'services'));
    }
    public function show($id)
    {
        $service = Service::findOrFail($id);
        // dd($service);
        $services = Service::all() ?? new Service();
        $settings = Setting::first() ?? new Setting();

        return view('website.services.service', compact('services', 'service', 'settings'));
    }
}
