<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        // 1. Validasi kredensial (Email & Password)
        $request->authenticate();

        // 2. Regenerasi session ID untuk mencegah Session Fixation
        $request->session()->regenerate();

        /**
         * 3. IMPLEMENTASI POIN 1 (SINGLE DEVICE LOGIN)
         * Fungsi ini akan menghapus semua session ID milik user ini di device lain.
         * Dengan ini, satu akun tidak bisa aktif di dua perangkat bersamaan.
         */
        Auth::logoutOtherDevices($request->password);

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}