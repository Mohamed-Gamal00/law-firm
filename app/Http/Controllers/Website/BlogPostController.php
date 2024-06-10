<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Service;
use App\Models\Setting;
use Jorenvh\Share\ShareFacade;

class BlogPostController extends Controller
{
    public function index()
    {
        $blogs = Post::paginate(10) ?? new Post();
        $settings = Setting::first() ?? new Setting();

        return view('website.blogs.index',compact('blogs','settings'));
    }
    public function show($id)
    {
        $blog = Post::findOrFail($id);
        $settings = Setting::first() ?? new Setting();

        $next = Post::select('id','title')->where('id', '>', $id)->orderBy('id')->first();
        $previous = Post::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $services = Service::all() ?? new Service();
        $blogs = Post::select('*')->take(6)->get() ?? new Post ;
        $shareLinks = ShareFacade::page(
            url()->current(),
            $blog->title
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->getRawLinks();

        return view('website.blogs.show-blog-details', compact('blog', 'next', 'previous','services', 'blogs', 'shareLinks', 'settings'));
    }
}
