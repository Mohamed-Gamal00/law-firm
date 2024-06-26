<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\NewsArticle;
use App\Models\Service;
use Jorenvh\Share\ShareFacade;

class NewsController extends Controller
{
    public function index()
    {
        $news = NewsArticle::paginate(10) ?? new NewsArticle();
        return view('website.news.index',compact('news'));
    }
    public function show($id)
    {
        $new = NewsArticle::findOrFail($id);
        $next = NewsArticle::select('id','title')->where('id', '>', $id)->orderBy('id')->first();
        $previous = NewsArticle::where('id', '<', $id)->orderBy('id', 'desc')->first();
        $services = Service::all() ?? new Service();
        $news = NewsArticle::select('*')->take(6)->get() ?? new NewsArticle ;
        $shareLinks = ShareFacade::page(
            url()->current(),
            $new->title
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->telegram()
            ->whatsapp()
            ->getRawLinks();

        return view('website.news.show-new-details', compact('new', 'next', 'previous','services', 'news', 'shareLinks'));
    }
}
