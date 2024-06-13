<?php

namespace App\Http\Controllers\Dashboard\customizesite;

use App\Http\Controllers\Controller;
use App\Models\TeamContent;
use Illuminate\Http\Request;

class TeamContentController extends Controller
{
    public function index()
    {
        $data = TeamContent::first() ?? new TeamContent();
        return view('dashboard.customize-site.teams.index', compact('data'));
    }


    public function update(Request $request)
    {
        $data = TeamContent::first();
        if (!$data) {
            $data = new TeamContent();
        }

        $rules = [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
        $messages = [
            'title.required' => 'العنوان مطلوب.',
            'title.string' => 'يجب أن يكون العنوان نصًا.',
            'title.max' => 'قد لا يزيد العنوان عن 255 حرفًا.',
            'content.required' => 'المحتوى مطلوب.',
            'content.string' => 'يجب أن يكون المحتوى نصًا.',
        ];
        // $this->validate($request, $rules);

        $validatedData = $request->validate($rules, $messages);

        $data->fill($validatedData);

        $data->save();

        return redirect()->route('team-content.index')->with('success', 'TeamContent content updated successfully.');
    }
}
