<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {


        if (Auth::user()->type == "PLAYER") {
            // return Auth::user()->type;
            return redirect()->route('admin.edit.player',Auth::user()->id);
        }
        return view('admin.dashboard');
    }
}
