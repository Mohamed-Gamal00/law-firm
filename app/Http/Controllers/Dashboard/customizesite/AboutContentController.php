<?php

namespace App\Http\Controllers\Dashboard\customizesite;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AboutContentController extends Controller
{
    public function index()
    {
        $about = About::first() ?? new About();
        // dd($about);
        return view('dashboard.customize-site.about-us.index', compact('about'));
    }

    public function edit()
    {
        $about = About::first();
        return view('dashboard.customize-site.about-us.index', compact('about'));
    }

    public function update(Request $request)
    {
        $about = About::first();
        if (!$about) {
            $about = new About();
        }

        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'video_link' => 'nullable|url|max:255',
            'video_title' => 'nullable|string|max:255',
            'video_content' => 'nullable|string',
            'points' => 'nullable|array',
            'team_work' => 'nullable|string|max:255',
            'happy_clients' => 'nullable|string|max:255',
            'successful_lawsuits' => 'nullable|string|max:255',
            'successful_consultations' => 'nullable|string|max:255',
        ];
        $this->validate($request, $rules);

        $data = $request->all();

        if ($request->has('features')) {
            $data['features'] = json_encode($request->features);
        }

        if ($request->has('feature_content')) {
            $data['feature_content'] = json_encode($request->feature_content);
        }

        if ($request->has('points')) {
            $data['points'] = json_encode($request->points);
        }


        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, "public");
        }

        // dd($data);

        $about->update($data);
        // $about->save();

        return redirect()->route('about-us.index')->with('success', 'About Us content updated successfully.');
    }

    protected function uploadImage(Request $request, $imagefolder)
    {
        if (!$request->hasFile('image')) {
            return null;
        }
        $filePath = Storage::putFile("$imagefolder", $request->image);
        return $filePath;
    }
}
