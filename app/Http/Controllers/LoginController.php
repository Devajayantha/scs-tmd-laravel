<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    use AuthenticatesUsers;

    /**
     * {@inheritDoc}
     */
    public function showLoginForm()
    {
        return view('layouts.pages.auth.login');
    }

    /**
     * {@inheritDoc}
     */
    protected function authenticated(Request $request, $user)
    {
        return to_route('notes.index');
    }

    /**
     * {@inheritDoc}
     */
    public function logout(Request $request)
    {
        if (! $this->guard()->check()) {
            return to_route('home');
        }

        $this->guard()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('home');
    }

    /**
     * {@inheritDoc}
     */
    protected function guard()
    {
        return Auth::guard();
    }
}
