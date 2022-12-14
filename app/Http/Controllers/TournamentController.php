<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function index()
    {
        return view('admin.tournaments.all-tournaments');
    }

    public function editTournament($slug)
    {
        $tournament = Tournament::where('slug', $slug)->first();
        return view('admin.tournaments.edit-tournament', compact('tournament'));
    }

    public function gallery($slug)
    {
        $tournament = Tournament::where('slug', $slug)->first();
        return view('admin.tournaments.gallery', compact('tournament'));
    }

    public function content($slug)
    {
        $tournament = Tournament::where('slug', $slug)->first();
        return view('admin.tournaments.content', compact('tournament'));
    }
}
