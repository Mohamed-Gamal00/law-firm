<?php

namespace App\Http\Controllers\Dashboard\customizesite;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Requests\AboutContentRequest;
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

    public function update(AboutContentRequest $request)
    {
        $about = About::first() ?? new About();

        $data = $request->validated();

        if ($request->has('points')) {
            $data['points'] = json_encode($request->points);
        }

        if ($request->hasFile('image')) {
            if ($about->image) {
                Storage::delete($about->image);
            }
            $data['image'] = $this->uploadImage($request, "public",'image');
        }

        // dd($data);


        $about->update($data);
        // $about->save();

        return redirect()->route('about-us.index')->with('success', 'About Us content updated successfully.');
    }

    // protected function uploadImage(Request $request, $imagefolder)
    // {
    //     $filePath = Storage::putFile("$imagefolder", $request->image);
    //     return $filePath;
    // }
}
