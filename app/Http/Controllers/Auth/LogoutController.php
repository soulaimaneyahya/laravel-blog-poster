<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Observers\PostObserver;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function __construct(
        private PostObserver $postObserver
    ) {
    }

    public function store(Request $request)
    {
        $this->postObserver->cacheForget();

        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home');
    }
}
