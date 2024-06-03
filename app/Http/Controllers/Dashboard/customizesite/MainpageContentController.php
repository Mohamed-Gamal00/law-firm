<?php

namespace App\Http\Controllers\Dashboard\customizesite;

use App\Http\Controllers\Controller;
use App\Models\MainpageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class MainpageContentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = MainpageContent::paginate(10);
        return view('dashboard.customize-site.main-page.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = new MainpageContent();
        return view('dashboard.customize-site.main-page.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        // dd($data);
        MainpageContent::create($data);

        return redirect()->route('main-page.index')->with('success', 'Content created successfully.');
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
        $data = MainpageContent::findOrFail($id);
        return view('dashboard.customize-site.main-page.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = MainpageContent::findOrFail($id);

        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
        $message = [
            'title.required' => 'الحقل مطلوب',
            'title.unique' => 'هذا العنوان موجود بالفعل',
            'content.required' => 'الحقل مطلوب',
        ];
        $this->validate($request, $rules, $message);

        $data->update($request->all());
        return Redirect::route('main-page.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = MainpageContent::findOrFail($id);
        $data->delete();
        return Redirect::route('main-page.index')->with('success', 'تم الحذف بنجاح');
    }
}
