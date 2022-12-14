<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Team;
use App\Models\Tournament;
use App\Models\User;

class HomeController extends Controller
{
    public function home()
    {
         $latest_game = Game::whereNotNull('our_score')->whereNotNull('opponent_score')->latest()->limit(1)->get()->first();
         $next_games = Game::whereNull('our_score')->whereNull('opponent_score')->oldest('date')->limit(7)->get();

        return view('home.main', compact('latest_game','next_games'));
    }

    public function tournament($slug)
    {
        $tournament = Tournament::where('slug', $slug)->first();

        return view('home.tournament', compact('tournament'));
    }


    public function team($slug)
    {
        $team = Team::where('slug',$slug)->first();


        return view('home.team',compact('team'));
    }

    public function player($slug)
    {
        $player = User::where('slug',$slug)->first();


        return view('home.player',compact('player'));
    }
}
