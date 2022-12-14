<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{

    public function allTeams()
    {
        return view('admin.teams.all-teams');
    }
    public function editTeam($slug)
    {
        $team = Team::where('slug', $slug)->first();
        return view('admin.teams.edit-team', compact('team'));
    }
    public function teamPlayers($id){
        return view('admin.users.players.players-list', compact('id'));
    }
}
