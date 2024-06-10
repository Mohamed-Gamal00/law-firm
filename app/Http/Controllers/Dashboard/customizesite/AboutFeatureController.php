<?php

namespace App\Http\Controllers\Dashboard\customizesite;

use App\Http\Controllers\Controller;
use App\Models\AboutFeature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class AboutFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $featuers = AboutFeature::paginate(10) ?? new AboutFeature();
        return view('dashboard.customize-site.about-us.featuers.index', compact('featuers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $featuer = new AboutFeature();
        return view('dashboard.customize-site.about-us.featuers.create', compact('featuer'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'title' => ' required|string|max:255',
            'desc' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
        $this->validate($request, $rules);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, "public");
        }

        // dd($data);
        AboutFeature::create($data);
        return Redirect::route('featuers.index')->with('success', 'تم انشاء عنصر جديد');
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
        $featuer = AboutFeature::findOrFail($id);
        return view('dashboard.customize-site.about-us.featuers.edit', compact('featuer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $featuers = AboutFeature::findOrFail($id);

        // Validate the request data
        $request->validate([
            'title' => ' required|string|max:255',
            'desc' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->all();


        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, "public");
        }
        // dd($data);

        $featuers->update($data);

        // Redirect back with a success message
        return redirect()->route('featuers.index')->with('success', 'featuers updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $featuer = AboutFeature::findOrFail($id);
        if ($featuer->image) {
            Storage::delete($featuer->image); //unlink
        }
        $featuer->delete();
        return Redirect::route('featuers.index')->with('success', 'featuer Deleted success');
    }
    protected function uploadImage(Request $request, $imagefolder)
    {
        if (!$request->hasFile('image')) {
            return null;
        }
        $filePath = Storage::putFile("$imagefolder", $request->image);
        return $filePath;
    }

}
