<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->latest()->with(['user', 'likes'])->paginate(5);

        return view('users.show', compact('user', 'posts'));
    }
}
