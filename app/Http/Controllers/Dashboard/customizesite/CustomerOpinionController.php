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
        return view('dashboard.customize-site.customer-opinion.index', compact('data'));
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
            'status' => 'nullable|string',
        ]);

        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request,"public");
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Restricting image file types to jpeg, png, jpg, and gif with a maximum size of 2MB
            'status' => 'nullable|string',
        ]);
        $data = $request->except('image');
        // dd($data);
        if ($request->hasFile('image')) {
            $oldImage = $opinion->image;
            if ($oldImage) {
                Storage::delete($opinion->image);
            }
            $data['image'] = $this->uploadImage($request,"public");
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
        Storage::delete($opinion->image); //unlink
        $opinion->delete();
        return Redirect::route('customer-opinion.index')->with('success', 'opinion Deleted success');
    }

    protected function uploadImage(Request $request, $imageFolder)
    {
        if (!$request->hasFile('image')) {
            return null;
        }
        $filePath = Storage::putFile("$imageFolder", $request->image);
        return $filePath;
    }
}
