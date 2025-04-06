<?php

// app/Http/Controllers/AuthAdminController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthAdminController extends Controller
{
   public function sendResetLinkEmail(Request $request)
{
    $request->validate(['email' => 'required|email']);

    $status = Password::broker('admins')->sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with('toast_success', __($status)) // ✅ send toast, no forgot_form
        : back()
            ->withErrors(['email' => __($status)])
            ->withInput()
            ->with('forgot_form', true); // only on error
}


    public function showResetForm(Request $request, $token = null)
    {
        return view('backend.auth.admin-reset-password')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    public function reset(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed|min:8',
        ]);

        $status = Password::broker('admins')->reset($request->only('email', 'password', 'password_confirmation', 'token'), function ($admin, $password) {
            $admin
                ->forceFill([
                    'password' => Hash::make($password),
                ])
                ->save();

            // Optionally log the user in after reset:
            // Auth::guard('admin')->login($admin);
        });

        return $status === Password::PASSWORD_RESET ? redirect()->route('login')->with('toast_success', 'Password successfully reset. Please login.') : back()->withErrors(['email' => [__($status)]]);
    }

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
        if (Auth::guard('admin')->attempt($credentials, $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended(route('backend.dashboard'));
        }

        return back()->with('login_error', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('backend/admin/login'); // Redirect to login after logout
    }
}
