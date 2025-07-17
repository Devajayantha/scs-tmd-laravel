<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    use RegistersUsers;

    /**
     * {@inheritDoc}
     */
    public function showRegistrationForm()
    {
        return view('layouts.pages.auth.register');
    }

    /**
     * {@inheritDoc}
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $this->guard()->login($user);

        return redirect()->route('notes.index');
    }

    /**
     * {@inheritDoc}
     */
    protected function registered(Request $request, $user)
    {
        return to_route('notes.index');
    }
}
