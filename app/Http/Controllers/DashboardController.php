<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = Auth::user()
        ->posts()
        ->latest()
        ->with('likes')
        ->paginate(5);

        return view('dashboard.index', compact('posts'));
    }
}
