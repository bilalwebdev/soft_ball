<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.users.admin.admin-list');
    }
    public function editAdmin($id)
    {
        $admin = User::find($id);
        return view('admin.users.admin.edit-admin', compact('admin'));
    }
}
