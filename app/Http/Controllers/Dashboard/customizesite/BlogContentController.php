<?php

namespace App\Http\Controllers\Dashboard\customizesite;

use App\Http\Controllers\Controller;
use App\Models\BlogContent;
use Illuminate\Http\Request;

class BlogContentController extends Controller
{
    public function index()
    {
        $data = BlogContent::first() ?? new BlogContent();
        return view('dashboard.customize-site.blog-content.index', compact('data'));
    }


    public function update(Request $request)
    {
        $data = BlogContent::first();
        if (!$data) {
            $data = new BlogContent();
        }

        $rules = [
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ];
        // $this->validate($request, $rules);

        $validatedData = $request->validate($rules);

        $data->fill($validatedData);

        $data->save();

        return redirect()->route('blog-content.index')->with('success', 'blog content updated successfully.');
    }
}
