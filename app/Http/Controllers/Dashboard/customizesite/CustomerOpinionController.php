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
        $image_section = CustomerOpinion::select('image_section', 'id')->whereNotNull('image_section')->first();
        return view('dashboard.customize-site.customer-opinion.index', compact('data', 'image_section'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = new CustomerOpinion();
        $image_section = CustomerOpinion::whereNotNull('image_section')->exists();
        if ($image_section == true) {
            $image_section = false;
            // dd($image_section);
        } else {
            $image_section = true;
        }
        return view('dashboard.customize-site.customer-opinion.create', compact('data', 'image_section'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $data = $request->validate([
        //     'name' => 'required|string|max:255',
        //     'content' => 'nullable|string',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Restricting image file types to jpeg, png, jpg, and gif with a maximum size of 2MB
        //     'image_section' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Restricting image file types to jpeg, png, jpg, and gif with a maximum size of 2MB
        //     'status' => 'nullable|string',
        // ]);


        $rules = [
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',
            'image' => 'nullable|image', // Restricting image file types to jpeg, png, jpg, and gif with a maximum size of 2MB
            'image_section' => 'nullable|image', // Restricting image file types to jpeg, png, jpg, and gif with a maximum size of 2MB
            'status' => 'nullable|string',
        ];
        $messages = [
            'name.required' => 'الاسم مطلوب.',
            'name.string' => 'يجب أن يكون الاسم نصًا.',
            'name.max' => 'قد لا يزيد الاسم عن 255 حرفًا.',
            'content.string' => 'يجب أن يكون المحتوى نصًا.',
            'image.image' => 'يجب أن يكون الملف صورة.',
            'image.mimes' => 'يجب أن يكون نوع الملف: jpeg، png، jpg، gif.',
            'image.max' => 'قد لا يزيد حجم الصورة عن 2048 كيلوبايت.',
            'image_section.image' => 'يجب أن يكون الملف صورة.',
            'status.string' => 'يجب أن يكون حالة العنصر نصًا.',
        ];
        $this->validate($request, $rules, $messages);


        // Prepare data for creating CustomerOpinion
        $data = $request->except(['image', 'image_section']);

        // Handle image upload for 'image'
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, "public", 'image');
        }
        // Handle image upload for 'image_section'
        if ($request->hasFile('image_section')) {
            $data['image_section'] = $this->uploadImage($request, "public", 'image_section');
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
        $image_section = $data->image_section;
        if ($image_section == null) {
            $image_section = false;
        }
        $image_whereNotNull = CustomerOpinion::whereNotNull('image_section')->exists();
        // dd($image_whereNotNull);
        if ($image_whereNotNull == false) {
            // dd($image_whereNotNull);
            $image_section = true;
        }

        return view('dashboard.customize-site.customer-opinion.edit', compact('data', 'image_section'));
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
        if ($request->hasFile('image')) {
            if ($opinion->image) {
                Storage::delete($opinion->image);
            }
            $data['image'] = $this->uploadImage($request, "public", 'image');
        }

        if ($request->hasFile('image_section')) {
            if ($opinion->image_section) {
                Storage::delete($opinion->image_section);
            }
            $data['image_section'] = $this->uploadImage($request, "public", 'image_section');
        }
        // dd($data);

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
}
