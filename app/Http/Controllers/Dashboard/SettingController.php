<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $settings = Setting::first();
        $settings = Setting::first() ?? new Setting();
        return view('dashboard.settings.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        $settings = Setting::first();

        if (!$settings) {
            $settings = new Setting();
        }

        return view('dashboard.settings.edit', compact('settings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $settings = Setting::first();
        if (!$settings) {
            $settings = new Setting();
        }

        // Validate the request data
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'nullable|regex:/(01)[0-9]{9}/',
            'email' => 'nullable|email|max:255',
            'fax' => 'nullable|string|max:255',
            'fb_link' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:255',
            'tw_link' => 'nullable|url|max:255',
            'insta_link' => 'nullable|url|max:255',
            'linkdin_link' => 'nullable|url|max:255',
            'footer_content_right' => 'nullable|string',
            'footer_content_left' => 'nullable|string',
            'booking_title' => 'nullable|string|max:255',
        ]);

        $data = $request->all();


        if ($request->hasFile('logo')) {
            $data['logo'] = $this->uploadImage($request, "settings");
        }
        // dd($data);
        // Update settings with request data
        $settings->fill($data);
        $settings->save();

        // Redirect back with a success message
        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    protected function uploadImage(Request $request, $imageFolder)
    {
        if (!$request->hasFile('logo')) {
            return null;
        }
        $filePath = Storage::putFile("$imageFolder", $request->logo);
        return $filePath;
    }
}
