<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
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
     * Update the specified resource in storage.
     */
    public function update(SettingRequest $request)
    {
        $settings = Setting::first() ?? new Setting();

        $data = $request->all();

        if ($request->hasFile('logo')) {
            if ($settings->logo) {
                Storage::delete($settings->logo);
            }
            $data['logo'] = $this->uploadImage($request, 'settings', 'logo');
        }

        $settings->update($data);
        return redirect()->route('settings.index')->with('success', 'Settings updated successfully.');
    }


    // protected function uploadImage(Request $request, $imagefolder, $fieldName)
    // {
    //     return Storage::putFile($imagefolder, $request->file($fieldName));
    // }
}
