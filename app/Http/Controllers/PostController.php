<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = [];
        return view('posts.index', compact('posts'));
    }

    public function store(StorePostRequest $request)
    {
        dd('ok');
    }

    public function update(UpdatePostRequest $request)
    {
        dd('ok');
    }
}
