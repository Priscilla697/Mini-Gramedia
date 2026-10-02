<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function register(Request $request)
    {
        // Validasi Registrasi
        $validatedData = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email:rfc,dns', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(8)->max(10)->uncompromised()]
        ], [
            'name.required' => 'Nama harus diisi',
            'name.min' => 'Nama minimal 3 karakter',
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'email.unique' => 'Email sudah digunakan',
            'password.required' => 'Password harus diisi',
            'password.confirmed' => 'Konfirmasi password tidak sesuai dengan password yang diberikan'
        ]);

        User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan masuk.');
    }

    public function login(Request $request)
    {
        // validasi Login
        $validatedData = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ], [
            'email.required' => 'Email harus diisi',
            'email.email' => 'Email tidak valid',
            'password.required' => 'Password harus diisi'
        ]);

        // autentikasi
        if (Auth::attempt($validatedData)) {
            $request->session()->regenerate();

            // kalo admin
            if (Auth::user()->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Berhasil Login');
            }

            // kalo bukan admin 
            return redirect()->route('home')->with('success', 'Berhasil Login');
        }

        // kalo ada yang salah (username atau pw)
        return redirect()->route('login')->with('error', 'Email dan password salah. Coba lagi!')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'Berhasil keluar');
    }
}
