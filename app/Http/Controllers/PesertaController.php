<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');

        // Fitur pencarian berdasarkan nama peserta & relasi skema
        $pesertas = Peserta::with('skema')
            ->when($search, function ($query, $search) {
                return $query->where('nm_peserta', 'like', "%{$search}%");
            })
            ->get();

        return view('peserta.index', compact('pesertas', 'search'));
    }

    public function create()
    {
        $skemas = Skema::all();
        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'skema_id' => 'required|exists:skemas,id',
            'nm_peserta' => 'required',
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        Peserta::create($request->all());

        return redirect()->route('pesertas.index')->with('success', 'Data peserta berhasil ditambahkan!');
    }

    public function show(Peserta $peserta)
    {
        return view('peserta.show', compact('peserta'));
    }

    public function edit(Peserta $peserta)
    {
        $skemas = Skema::all();
        return view('peserta.edit', compact('peserta', 'skemas'));
    }

    public function update(Request $request, Peserta $peserta)
    {
        $request->validate([
            'skema_id' => 'required|exists:skemas,id',
            'nm_peserta' => 'required',
            'jk' => 'required|in:L,P',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $peserta->update($request->all());

        return redirect()->route('pesertas.index')->with('success', 'Data peserta berhasil diperbarui!');
    }

    public function destroy(Peserta $peserta)
    {
        $peserta->delete();
        return redirect()->route('pesertas.index')->with('success', 'Data peserta berhasil dihapus!');
    }
}
