<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    public function index()
    {
        $skemas = Skema::all();
        return view('skema.index', compact('skemas'));
    }

    public function create()
    {
        return view('skema.create');
    }

    public function store(Request $request)
    {
        // Menyimpan data hasil validasi ke variabel $validated
        $validated = $request->validate([
            'kd_skema' => 'required|unique:skemas,kd_skema',
            'nm_skema' => 'required',
            'jenis' => 'required',
            'jumlah_unit' => 'required|numeric',
        ]);

        // Menggunakan $validated agar field token/CSRF diabaikan
        Skema::create($validated);

        return redirect()->route('skemas.index')->with('success', 'Skema berhasil ditambahkan!');
    }

    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    public function show(Skema $skema)
    {
        return view('skema.show', compact('skema'));
    }

    public function update(Request $request, Skema $skema)
    {
        $validated = $request->validate([
            'kd_skema' => 'required|unique:skemas,kd_skema,' . $skema->id,
            'nm_skema' => 'required',
            'jenis' => 'required',
            'jumlah_unit' => 'required|numeric',
        ]);

        // Mengupdate menggunakan data yang tervalidasi
        $skema->update($validated);

        return redirect()->route('skemas.index')->with('success', 'Skema berhasil diperbarui!');
    }

    public function destroy(Skema $skema)
    {
        $skema->delete();
        return redirect()->route('skemas.index')->with('success', 'Skema berhasil dihapus!');
    }
}
