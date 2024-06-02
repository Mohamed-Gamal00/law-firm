<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teams = Team::paginate(10);
        return view('dashboard.teams.index', compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $member = new Team();
        return view('dashboard.teams.create', compact('member'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TeamRequest $request)
    {
        $data = $request->validated();
        $data = $request->except('image');

        if ($request->has('certifications')) {
            $data['certifications'] = json_encode($request->certifications);
        }

        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, "teams");
        }
        // dd($data);
        Team::create($data);
        return Redirect::route('teams.index')->with('success', 'تم انشاء عضو جديد');
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
        $member = Team::findOrFail($id);
        return view('dashboard.teams.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TeamRequest $request, string $id)
    {
        $team = Team::findOrFail($id);
        $data = $request->validated();
        $data = $request->except('image');

        if ($request->has('certifications')) {
            $data['certifications'] = json_encode($request->certifications);
        }
        if ($request->hasFile('image')) {
            $data['image'] = $this->uploadImage($request, "teams");
        }
        $team->update($data);
        return Redirect::route('teams.index')->with('success', 'تم تعديل العضو بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Team::findOrFail($id);
        // dd($member);
        if ($member->image) {
            Storage::delete($member->image); //unlink
        }
        $member->delete();
        return Redirect::route('teams.index')->with('success', 'member Deleted success');
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
