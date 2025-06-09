<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LogoutController extends Controller
{
    public function logout(Request $request)
    {
        Auth::logout();
        // Optionally invalidate the session
        $request->session()->invalidate();

        // Optionally regenerate CSRF token
        $request->session()->regenerateToken();
        return redirect('');
    }
}
