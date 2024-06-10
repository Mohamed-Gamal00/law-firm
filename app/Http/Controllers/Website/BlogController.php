<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Http\Request;
use Jorenvh\Share\ShareFacade;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(10) ?? new Post();
        $settings = Setting::first() ?? new Setting();
        return view('website.posts.index', compact('posts', 'settings'));
    }
    public function show($id)
    {
        $post = Post::findOrFail($id);
        $next = Post::select('id', 'title')->where('id', '>', $id)->orderBy('id')->first();
        $previous = Post::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $services = Service::all() ?? new Service();
        $posts = Post::select('*')->take(6)->get() ?? new Post;

        $shareLinks = ShareFacade::page(
            url()->current(),
            $post->title
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->getRawLinks();


        // dd($shareLinks['facebook']);
        return view('website.posts.show-post-details', compact('post', 'next', 'previous', 'services', 'posts', 'shareLinks'));
    }
}
