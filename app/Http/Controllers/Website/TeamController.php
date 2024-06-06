<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Team;
use App\Models\TeamContent;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index()
    {
        $teamContent = TeamContent::first() ?? new TeamContent();
        $teams = Team::all() ?? new Team();
        $settings = Setting::first() ?? new Setting();

        return view('website.teams.index',compact('settings','teamContent','teams'));
    }

    public function show($id)
    {
        $member = Team::findOrFail($id);
        return view('website.teams.show-member', compact('member'));
    }
}
