<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ServiceRequest;
use App\Models\NewsArticle;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $services = Service::paginate(10);
        if ($services) {
            return view('dashboard.services.index', compact('services'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $service = new Service();
        return view('dashboard.services.create', compact('service'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $data = $request->validated();
        $data = $request->except('image');

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, "services",'image');
        }
        // dd($data);
        Service::create($data);
        return Redirect::route('services.index')->with('success', 'تم انشاء عنصر جديد');
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
        $service = Service::findOrFail($id);
        return view('dashboard.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, string $id)
    {
        $service = Service::findOrFail($id);
        $data = $request->validated();

        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::delete($service->image);
            }
            $data['image'] = $this->uploadImage($request, "services",'image');
        }
        // dd($data);
        $service->update($data);
        return Redirect::route('services.index')->with('success', 'تم التعديل ب نجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $service = Service::findOrFail($id);
        // dd($service);
        if($service->image) {
            Storage::delete($service->image); //unlink
        }
        $service->delete();
        return Redirect::route('services.index')->with('success', 'serivce Deleted success');
    }

    // protected function uploadImage(Request $request, $imageFolder)
    // {
    //     if (!$request->hasFile('image')) {
    //         return null;
    //     }
    //     $filePath = Storage::putFile("$imageFolder", $request->image);
    //     return $filePath;
    // }
}
