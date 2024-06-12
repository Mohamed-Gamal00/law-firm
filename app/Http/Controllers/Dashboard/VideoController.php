<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $videos = Video::paginate(10);
        return view('dashboard.videos.index', compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $video = new Video();
        return view('dashboard.videos.create', compact('video'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'video_path' => 'required|file|mimetypes:video/mp4|max:50240',
        // ]);
        $data =$request->validate([
            'video_path' => 'required|url',
        ]);

        // $data = $request->except('video_path');

        // if ($request->hasFile('video_path')) {
        //     $data['video_path'] = $this->uploadVideo($request, "videos");
        // }

        // dd($data);

        Video::create($data);

        return redirect()->route('videos.index')->with('success', 'Video uploaded successfully');
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
    public function edit(string $id)
    {
        $video = Video::findOrFail($id);
        return view('dashboard.videos.edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $video = Video::findOrFail($id);

        $data =$request->validate([
            'video_path' => 'url', // 10MB max size
        ]);

        $video->update($data);
        return Redirect::route('videos.index')->with('success', 'تم تعديل عنصر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $video = Video::findOrFail($id);
        // if ($video->video_path) {
        //     Storage::delete($video->video_path); //unlink
        // }
        // dd($video);
        $video->delete();
        return Redirect::route('videos.index')->with('success', 'video Deleted success');
    }

    // protected function uploadVideo(Request $request, $vidoefolder)
    // {
    //     if (!$request->hasFile('video_path')) {
    //         return null;
    //     }
    //     $filePath = Storage::putFile("$vidoefolder", $request->video_path);
    //     return $filePath;
    // }
}
