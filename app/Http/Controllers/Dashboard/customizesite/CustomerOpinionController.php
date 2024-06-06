<?php

namespace App\Http\Controllers\Dashboard\customizesite;

use App\Http\Controllers\Controller;
use App\Models\CustomerOpinion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class CustomerOpinionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = CustomerOpinion::paginate(10);
        // $imageId = CustomerOpinion::whereNotNull('image_section')->pluck('id')->first();
        $image_section = CustomerOpinion::select('image_section', 'id')->whereNotNull('image_section')->first();
        // dd($image_section);

        // $image_section = CustomerOpinion::whereNotNull('image_section')->pluck('image_section')[0] ?? new CustomerOpinion;
        return view('dashboard.customize-site.customer-opinion.index', compact('data', 'image_section'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = new CustomerOpinion();
        return view('dashboard.customize-site.customer-opinion.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Restricting image file types to jpeg, png, jpg, and gif with a maximum size of 2MB
            'image_section' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Restricting image file types to jpeg, png, jpg, and gif with a maximum size of 2MB
            'status' => 'nullable|string',
        ]);

        // Prepare data for creating CustomerOpinion
        $data = $request->except(['image', 'image_section']);

        // Handle image upload for 'image'
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), "public");
        }
        // Handle image upload for 'image_section'
        if ($request->hasFile('image_section')) {
            // Check if image_section already exists
            if (CustomerOpinion::whereNotNull('image_section')->exists()) {
                return redirect()->route('customer-opinion.create')->with('image_section', 'Image section already exists.');
            } else {
                $data['image_section'] = $this->uploadImage($request->file('image_section'), "public");
            }
        }
        // dd($data);

        CustomerOpinion::create($data);

        return redirect()->route('customer-opinion.index')->with('success', 'Content created successfully.');
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
        $data = CustomerOpinion::findOrFail($id);
        return view('dashboard.customize-site.customer-opinion.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $opinion = CustomerOpinion::findOrFail($id);
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image_section' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'nullable|string',
        ]);

        // Separate image and image_section from other data
        $data = $request->except(['image', 'image_section']);

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request->file('image'), "public");
        }

        // Handle image_section update without blocking the update
        if ($request->hasFile('image_section')) {
            $data['image_section'] = $this->uploadImage($request->file('image_section'), "public");
        }
        $opinion->update($data);
        return Redirect::route('customer-opinion.index')->with('success', 'تم التعديل ب نجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $opinion = CustomerOpinion::findOrFail($id);
        if ($opinion->image) {
            Storage::delete($opinion->image); //unlink
        }
        $opinion->delete();
        return Redirect::route('customer-opinion.index')->with('success', 'opinion Deleted success');
    }


    /*
    $image = request file
    $disk = place which saved in this cace will saved in public folder
    */
    private function uploadImage($image, $disk)
    {
        $path = $image->store($disk);
        return $path;
    }
}
