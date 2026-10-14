<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah!',
        ])->onlyInput('email');
    }

    public function showRegister()
    {
        return view('auth.Register');
    }

    public function register(Request $request)
    {
        // 1. Validasi input nama, email (harus unik), dan password
        $validated = $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:5',
        ]);

        // 2. Buat akun User dengan role 'peserta'
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role'     => 'peserta',
        ]);

        // 3. Otomatis buatkan baris data profil di tabel pesertas
        Peserta::create([
            'user_id'    => $user->id,
            'skema_id'   => 1, // Default ID skema awal
            'nm_peserta' => $validated['name'],
            'jk'         => 'L',  // Default jenis kelamin
            'no_hp'      => '-',  // Default No HP
            'alamat'     => '-',  // Default Alamat
        ]);

        // 4. DIARAHKAN KE HALAMAN LOGIN (Bukan otomatis login)
        return redirect()->route('login')->with('success', 'Registrasi berhasil! Silakan login menggunakan email dan password Anda.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
