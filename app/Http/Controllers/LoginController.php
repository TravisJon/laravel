<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginuser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {

            // buat ulang session login
            $request->session()->regenerate();

            if (auth()->user()->role_id === 1) {
                // jika user superadmin
                return redirect()->intended('/admin');
            } else {
                // jika user pegawai
                return redirect()->intended('/teknisi');
            }
        }

        // jika email atau password salah
        // kirimkan session error
        return back()->with('error', 'Email atau Password yang anda masukkan salah');
    }

    public function register()
    {
        $role = Role::all();
        return view('auth.register', ['role' => $role]);
    }

    public function registeruser(Request $request)
    {
        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
            'role_id' => $request->role_id,
        ]);

        return redirect('/')
            ->with('success', 'Register Berhasil');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
