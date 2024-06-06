<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index()
    {
        $photos = Photo::all() ?? new Photo();
        return view('website.photos.index', compact('photos'));
    }
}
