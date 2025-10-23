<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Ambil semua data mahasiswa dari database
        $mahasiswa = Mahasiswa::all();

        // Kirim data ke view
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function create()
    {
        $prodi = Prodi::with('fakultas')->get();
        return view('mahasiswa.create', compact('prodi'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nim' => ['required', 'numeric', 'unique:mahasiswas,nim'],
            'nama' => ['required', 'string', 'max:255'],
            'prodi_id' => ['required', 'exists:prodis,id'],
        ], [
            'nim.required' => 'NIM wajib diisi.',
            'nim.unique' => 'NIM sudah terdaftar.',
            'nama.required' => 'Nama wajib diisi.',
            'prodi_id.required' => 'Prodi wajib dipilih.',
        ]);

        Mahasiswa::create($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil ditambahkan.');
    }

    public function edit(Mahasiswa $mahasiswa)
    {
        $prodi = Prodi::with('fakultas')->get();
        return view('mahasiswa.edit', compact('mahasiswa', 'prodi'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validated = $request->validate([
            'nim' => ['required', 'numeric', Rule::unique('mahasiswas', 'nim')->ignore($mahasiswa->id)],
            'nama' => ['required', 'string', 'max:255'],
            'prodi_id' => ['required', 'exists:prodis,id'],
        ]);

        $mahasiswa->update($validated);

        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil diperbarui.');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa berhasil dihapus.');
    }
}
