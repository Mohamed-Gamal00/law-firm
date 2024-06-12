<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::paginate(10);
        if ($photos) {
            return view('dashboard.photos.index', compact('photos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $photo = new Photo();
        return view('dashboard.photos.create', compact('photo'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $message = [
            'title.required' => 'title is required',
            'title.string' => 'The title must be a string.',
            'image.required' => 'file image is required',
            'image.image' => 'The image must be an image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
        ];
        $this->validate($request, $rules, $message);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, "photos", 'image');
        }

        // dd($data);
        Photo::create($data);
        return Redirect::route('photos.index')->with('success', 'تم انشاء عنصر جديد');
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
        $photo = Photo::findOrFail($id);
        return view('dashboard.photos.edit', compact('photo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $photo = Photo::findOrFail($id);

        $rules = [
            'title' => 'nullable|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $message = [
            'title.required' => 'title is required',
            'title.string' => 'The title must be a string.',
            'image.image' => 'The image must be an image file.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
        ];
        $this->validate($request, $rules, $message);

        $data = $request->except('image');
        // dd($data);
        if ($request->hasFile('image')) {
            if ($photo->image) {
                Storage::delete($photo->image);
            }
            $data['image'] = $this->uploadImage($request, "photos",'image');
        }

        // dd($data);
        $photo->update($data);
        return Redirect::route('photos.index')->with('success', 'تم تعديل عنصر بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $photo = Photo::findOrFail($id);
        // dd($photo);
        if ($photo->image) {
            Storage::delete($photo->image); //unlink
        }
        $photo->delete();
        return Redirect::route('photos.index')->with('success', 'photo Deleted success');
    }

    // protected function uploadImage(Request $request, $imagefolder)
    // {
    //     if (!$request->hasFile('image')) {
    //         return null;
    //     }
    //     $filePath = Storage::putFile("$imagefolder", $request->image);
    //     return $filePath;
    // }
}
