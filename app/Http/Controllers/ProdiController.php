<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Fakultas;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ProdiController extends Controller
{
    // ✅ Mapping Fakultas dan Prodi yang valid
    private $validMapping = [
        'fakultas teknik' => [
            'teknik informatika',
            'teknik elektro',
            'teknik mesin',
            'teknik lingkungan',
            'arsitektur',
        ],
        'fakultas hukum' => [
            'ilmu hukum',
        ],
        'fakultas ekonomi dan bisnis' => [
            'manajemen',
            'akuntansi',
            'ekonomi pembangunan',
        ],
        'fakultas kedokteran' => [
            'kedokteran umum',
            'kedokteran gigi',
            'farmasi',
        ],
    ];

    public function index()
    {
        $prodi = Prodi::with('fakultas')->get();
        return view('prodi.index', compact('prodi'));
    }

    public function create()
    {
        $fakultas = Fakultas::all();
        return view('prodi.create', compact('fakultas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'fakultas_id' => 'required|exists:fakultas,id',
        ]);

        // Daftar fakultas dan prodi yang diizinkan
        $allowed = [
            'Hukum' => ['Ilmu Hukum'],
            'Teknik' => ['Teknik Sipil', 'Teknik Lingkungan', 'Arsitektur'],
            'Peternakan' => ['Ilmu Peternakan', 'Teknologi Hasil Ternak'],
            'Ilmu Budaya' => ['Sastra Indonesia', 'Sastra Inggris'],
        ];

        $fakultas = Fakultas::findOrFail($request->fakultas_id);
        $nama_fakultas = $fakultas->nama_fakultas;
        $nama_prodi = $request->nama_prodi;

        if (!isset($allowed[$nama_fakultas]) || !in_array($nama_prodi, $allowed[$nama_fakultas])) {
            return back()->withErrors([
                'fakultas_id' => 'Prodi ini tidak sesuai dengan fakultas yang dipilih.'
            ])->withInput();
        }

        Prodi::create($request->all());

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan!');
    }

    public function edit(Prodi $prodi)
{
    $fakultas = Fakultas::all();
    return view('prodi.edit', compact('prodi', 'fakultas'));
}

    public function update(Request $request, Prodi $prodi)
{
    $validated = $request->validate([
        'nama_prodi' => 'required|string|max:255',
        'fakultas_id' => 'required|exists:fakultas,id',
    ]);

    $fakultas = \App\Models\Fakultas::find($validated['fakultas_id']);

    $rules = [
        'Fakultas Hukum' => ['Ilmu Hukum'],
        'Fakultas Teknik' => ['Arsitektur', 'Teknik Lingkungan', 'Teknik Sipil'],
        'Fakultas Teknologi Informasi' => ['Sistem Informasi', 'Teknologi Informasi', 'Informatika'],
        'Fakultas Ekonomi' => ['Manajemen', 'Akuntansi', 'Ekonomi Pembangunan'],
    ];

    if (!isset($rules[$fakultas->nama_fakultas])) {
        return back()->withErrors([
            'fakultas_id' => 'Fakultas ini belum memiliki daftar prodi yang diizinkan.',
        ])->withInput();
    }

    if (!in_array($validated['nama_prodi'], $rules[$fakultas->nama_fakultas])) {
        return back()->withErrors([
            'nama_prodi' => 'Prodi "' . $validated['nama_prodi'] . '" tidak sesuai dengan Fakultas "' . $fakultas->nama_fakultas . '".',
        ])->withInput();
    }

    $exists = \App\Models\Prodi::where('nama_prodi', $validated['nama_prodi'])
        ->where('fakultas_id', $validated['fakultas_id'])
        ->where('id', '!=', $prodi->id)
        ->exists();

    if ($exists) {
        return back()->withErrors([
            'nama_prodi' => 'Prodi ini sudah terdaftar dalam fakultas tersebut.',
        ])->withInput();
    }

    $prodi->update($validated);

    return redirect()->route('prodi.index')->with('success', 'Prodi berhasil diperbarui.');
}

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus.');
    }
}
