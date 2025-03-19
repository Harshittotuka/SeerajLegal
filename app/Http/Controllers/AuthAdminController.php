<?php

// app/Http/Controllers/AuthAdminController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
   public function showLoginForm()
{
    // Check if the admin is already authenticated
    if (Auth::guard('admin')->check()) {
        // Redirect to the admin dashboard if logged in
        return redirect()->route('backend.dashboard');
    }

    // Otherwise, show the login form
    return view('backend.auth.login');
}

public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);
  
    // Use 'admin' guard here
    if (Auth::guard('admin')->attempt($credentials, $request->remember)) {
        $request->session()->regenerate();
        return redirect()->intended(route('backend.dashboard'));
    }

    return back()->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
}


   public function logout(Request $request)
{
    Auth::guard('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect('backend/admin/login'); // Redirect to login after logout
}

}