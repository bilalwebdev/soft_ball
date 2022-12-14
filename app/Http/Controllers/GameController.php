<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Tournament;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function editGame($id)
    {
        $game = Game::where('id', $id)->first();
        return view('admin.games.edit-game', compact('game'));
    }
}
