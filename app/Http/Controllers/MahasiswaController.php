<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        // Ambil data dari session, kalau belum ada, isi data awal
        $mahasiswa = session('mahasiswa', [
            1 => ['id'=>1, 'nim'=>'2305505001', 'nama'=>'Putu Agus', 'prodi'=>'Teknologi Informasi'],
            2 => ['id'=>2, 'nim'=>'2305405002', 'nama'=>'Made Cenik', 'prodi'=>'Teknik Elektro'],
            3 => ['id'=>3, 'nim'=>'2305405003', 'nama'=>'Kadek Sari', 'prodi'=>'Sistem Informasi']
        ]);

        session(['mahasiswa' => $mahasiswa]);
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function destroy($id)
    {
        $mahasiswa = session('mahasiswa', []);

        if (!isset($mahasiswa[$id])) {
            return redirect('/mahasiswa')->with('error', 'Mahasiswa tidak ditemukan.');
        }

        unset($mahasiswa[$id]); // hapus data sesuai ID
        session(['mahasiswa' => $mahasiswa]); // simpan lagi ke session

        return redirect('/mahasiswa')->with('success', 'Mahasiswa berhasil dihapus.');
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        $mahasiswa = session('mahasiswa', []);
        $id = count($mahasiswa) + 1;
        $mahasiswa[$id] = [
            'id' => $id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
        ];

        session(['mahasiswa' => $mahasiswa]);

        return redirect('/mahasiswa')->with('success', 'Mahasiswa baru berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $mahasiswa = session('mahasiswa', []);
        $m = $mahasiswa[$id] ?? null;

        if (!$m) {
            return redirect('/mahasiswa')->with('error', 'Mahasiswa tidak ditemukan.');
        }

        return view('mahasiswa.edit', compact('m'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nim' => 'required|min:4',
            'nama' => 'required',
            'prodi' => 'required'
        ]);

        $mahasiswa = session('mahasiswa', []);
        if (!isset($mahasiswa[$id])) {
            return redirect('/mahasiswa')->with('error', 'Mahasiswa tidak ditemukan.');
        }

        $mahasiswa[$id] = [
            'id' => $id,
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi
        ];

        session(['mahasiswa' => $mahasiswa]);

        return redirect('/mahasiswa')->with('success', 'Data mahasiswa berhasil diperbarui.');
    }
}
