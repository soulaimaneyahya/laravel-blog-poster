<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $posts = auth()->user()->posts()->latest()->with('likes')->paginate(5);

        return view('dashboard.index', compact('posts'));
    }
}
