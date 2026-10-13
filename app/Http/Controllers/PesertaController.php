<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PesertaController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $pesertas = Peserta::with(['user', 'skema'])->get();
        } else {
            $pesertas = Peserta::with(['user', 'skema'])->where('user_id', Auth::id())->get();
        }

        return view('pesertas.index', compact('pesertas'));
    }

    public function create()
    {
        $skemas = Skema::all();
        // Variabel $users tidak diperlukan lagi karena akun dibuat otomatis
        return view('pesertas.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nm_peserta' => 'required',
            'email'      => 'required|email', // Validasi email unik untuk login
            'password'   => 'required',                    // Password login peserta
            'skema_id'   => 'required|exists:skemas,id',
            'jk'         => 'required|in:L,P',
            'no_hp'      => 'required|digits:12',
            'alamat'     => 'required|string',
        ]);

        // 1. Otomatis buatkan akun user dengan role 'peserta'
        $user = User::create([
            'name'     => $request->nm_peserta,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'peserta',
        ]);

        // 2. Simpan data peserta dan hubungkan dengan user_id yang baru saja dibuat
        Peserta::create([
            'user_id'    => $user->id,
            'skema_id'   => $request->skema_id,
            'nm_peserta' => $request->nm_peserta,
            'jk'         => $request->jk,
            'no_hp'      => $request->no_hp,
            'alamat'     => $request->alamat,
        ]);

        return redirect()->route('pesertas.index')->with('success', 'Data peserta dan akun login berhasil dibuat!');
    }

    public function show(Peserta $peserta)
    {
        if (Auth::user()->role === 'peserta' && $peserta->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        return view('pesertas.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        if (Auth::user()->role === 'peserta' && $peserta->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $skemas = Skema::all();
        return view('pesertas.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        if (Auth::user()->role === 'peserta' && $peserta->user_id !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'skema_id'   => 'required|exists:skemas,id',
            'nm_peserta' => 'required|string',
            'jk'         => 'required|in:L,P',
            'no_hp'      => 'required|digits:12',
            'alamat'     => 'required|string',
        ]);

        $peserta->update($request->all());

        // Update juga nama di tabel users jika namanya ikut diubah
        if ($peserta->user) {
            $peserta->user->update(['name' => $request->nm_peserta]);
        }

        return redirect()->route('pesertas.index')->with('success', 'Data peserta berhasil diperbarui!');
    }

    public function destroy(Peserta $peserta)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized action.');
        }

        // Hapus akun user terkait jika ada
        if ($peserta->user) {
            $peserta->user->delete();
        }

        $peserta->delete();
        return redirect()->route('pesertas.index')->with('success', 'Data peserta dan akun login berhasil dihapus!');
    }
}
