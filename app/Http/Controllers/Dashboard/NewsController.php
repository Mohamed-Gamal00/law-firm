<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\NewsRequest;
use App\Models\NewsArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = NewsArticle::paginate(10);
        return view('dashboard.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $new = new NewsArticle();
        return view('dashboard.news.create', compact('new'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NewsRequest $request)
    {
        $data = $request->validated();
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, "news");
        }
        NewsArticle::create($data);
        return Redirect::route('news.index')->with('success', 'تم انشاء عنصر جديد');
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
        $new = NewsArticle::findOrFail($id);
        return view('dashboard.news.edit', compact('new'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NewsRequest $request, string $id)
    {
        $new = NewsArticle::findOrFail($id);
        $data = $request->validated();

        $data = $request->except('image');
        if ($request->hasFile('image')) {
            Storage::delete($new->image); //unlink
            $data['image'] = $this->uploadImage($request, "news");
        }
        // dd($data);
        $new->update($data);
        return Redirect::route('news.index')->with('success', 'تم التعديل ب نجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $new = NewsArticle::findOrFail($id);
        if ($new->image) {
            Storage::delete($new->image); //unlink
        }
        $new->delete();
        return Redirect::route('news.index')->with('success', 'new Deleted success');
    }

    protected function uploadImage(Request $request, $imageFolder)
    {
        if (!$request->hasFile('image')) {
            return null;
        }
        // $filePath = $request->file('image')->store('posts', 'public');
        $filePath = Storage::putFile("$imageFolder", $request->image);
        return $filePath;
    }
}
