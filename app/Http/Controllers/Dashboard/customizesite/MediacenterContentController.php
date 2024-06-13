<?php

namespace App\Http\Controllers\Dashboard\customizesite;

use App\Http\Controllers\Controller;
use App\Models\MediaCenter;
use Illuminate\Http\Request;

class MediacenterContentController extends Controller
{
    public function index()
    {
        $data = MediaCenter::first() ?? new MediaCenter();
        return view('dashboard.customize-site.media-center.index', compact('data'));
    }

    public function update(Request $request)
    {
        // Find or create a new instance of MediaCenter
        $data = MediaCenter::first();
        if (!$data) {
            $data = new MediaCenter();
        }

        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'video_link' => 'required|url',
        ];
        $messages = [
            'title.required' => 'العنوان مطلوب.',
            'title.string' => 'يجب أن يكون العنوان نصًا.',
            'content.required' => 'المحتوى مطلوب.',
            'content.string' => 'يجب أن يكون المحتوى نصًا.',
            'video_link.required' => 'رابط الفيديو مطلوب.',
            'video_link.url' => 'يجب أن يكون رابط الفيديو عنوان URL صحيحًا.',
        ];

        $validatedData = $request->validate($rules, $messages);

        // Fill the model with the validated data
        $data->fill($validatedData);

        // Save the updated model
        $data->save();

        return redirect()->route('media-center.index')->with('success', 'Media Center content updated successfully.');
    }


}
