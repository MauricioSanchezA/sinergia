<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{

public function login(Request $request)
{
    $credentials = $request->validate([
        'documento' => ['required'],
        'password' => ['required'],
    ]);

    if (Auth::attempt(['documento' => $credentials['documento'], 'password' => $credentials['password']])) {
        return redirect()->intended('dashboard');
    }

    return back()->withErrors(['documento' => 'Credenciales incorrectas']);
}
}
