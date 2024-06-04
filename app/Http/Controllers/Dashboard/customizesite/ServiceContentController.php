<?php

namespace App\Http\Controllers\Dashboard\customizesite;

use App\Http\Controllers\Controller;
use App\Models\ServiceContent;
use Illuminate\Http\Request;

class ServiceContentController extends Controller
{
    public function index()
    {
        $data = ServiceContent::first() ?? new ServiceContent();
        return view('dashboard.customize-site.services.index', compact('data'));
    }


    public function update(Request $request)
    {
        $data = ServiceContent::first();
        if (!$data) {
            $data = new ServiceContent();
        }

        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
        // $this->validate($request, $rules);

        $validatedData = $request->validate($rules);

        $data->fill($validatedData);

        $data->save();

        return redirect()->route('service-content.index')->with('success', 'About Us content updated successfully.');
    }
}
