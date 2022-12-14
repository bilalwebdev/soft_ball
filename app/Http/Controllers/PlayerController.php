<?php

namespace App\Http\Controllers;

use App\Models\PlayerReference;
use App\Models\User;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    public function index()
    {
        return view('admin.users.players.players-list');
    }
    public function editPlayer($id)
    {
        $player = User::find($id);
        return view('admin.users.players.edit-player', compact('player'));
    }

    public function gallery($id)
    {
        $player = User::find($id);
        return view('admin.users.players.gallery', compact('player'));
    }
    public function reference($id)
    {
        $player = User::find($id);
        return view('admin.users.players.references.reference', compact('player'));
    }
    public function editReference($id)
    {
        $reference = PlayerReference::find($id);
        return view('admin.users.players.references.edit-reference', compact('reference'));
    }

    public function resetPassword($id)
    {

        $player = User::find($id);
        return view('admin.users.players.update-password', compact('player'));
    }
}
