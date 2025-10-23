<?php

namespace App\Http\Controllers;

use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class FakultasController extends Controller
{
    public function index()
    {
        $fakultas = Fakultas::all();
        return view('fakultas.index', compact('fakultas'));
    }

    public function create()
    {
        return view('fakultas.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_fakultas' => 'required|string|max:255|unique:fakultas,nama_fakultas',
        ], [
            'nama_fakultas.required' => 'Nama fakultas wajib diisi.',
            'nama_fakultas.unique' => 'Nama fakultas sudah terdaftar.',
        ]);

        Fakultas::create($validated);
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil ditambahkan.');
    }

    public function edit(Fakultas $fakultas)
    {
        return view('fakultas.edit', compact('fakultas'));
    }

    public function update(Request $request, Fakultas $fakultas)
    {
        $validated = $request->validate([
            'nama_fakultas' => [
                'required',
                'string',
                'max:255',
                Rule::unique('fakultas', 'nama_fakultas')->ignore($fakultas->id),
            ],
        ], [
            'nama_fakultas.required' => 'Nama fakultas wajib diisi.',
            'nama_fakultas.unique' => 'Nama fakultas sudah terdaftar.',
        ]);

        $fakultas->update($validated);
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil diperbarui.');
    }

    public function destroy(Fakultas $fakultas)
    {
        $fakultas->delete();
        return redirect()->route('fakultas.index')->with('success', 'Fakultas berhasil dihapus.');
    }
}
