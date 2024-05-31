<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.adminpage', compact('users'));
    }
}
