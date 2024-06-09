<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $videos = Video::all() ?? new Video();
        // dd($videos[1]->video_path);
        return view('website.videos.index',compact('videos'));
    }
}
