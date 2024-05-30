<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate(10);
        return view('dashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = new Category();
        return view('dashboard.categories.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required|unique:categories',

        ];
        $message = [
            'name.required' => 'الحقل مطلوب',
            'name.unique' => 'هذا الاسم موجود بالفعل'
        ];
        $this->validate($request, $rules, $message);

        Category::create($request->all());
        return Redirect::route('categories.index')->with('success', 'تم انشاء عنصر جديد بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);

        $rules = [
            'name' => 'required|unique:categories',
        ];
        $message = [
            'name.required' => 'الحقل مطلوب',
            'name.unique' => 'هذا الاسم موجود بالفعل'
        ];
        $this->validate($request, $rules, $message);

        $category->update($request->all());
        return Redirect::route('categories.index')->with('success', 'تم التعديل بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return Redirect::route('categories.index')->with('success', 'تم الحذف بنجاح');
    }
}
