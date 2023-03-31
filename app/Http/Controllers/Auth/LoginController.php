<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }
    
    /**
     * store fct & login
     *
     * @param  LoginRequest $request
     * @return RedirectResponse
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // @method static bool attempt(array $credentials = [], bool $remember = false)
        if (!auth()->attempt($request->validated(), $request->remember)) {
            return back()->with('status', 'These credentials do not match our records');
        }
        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
