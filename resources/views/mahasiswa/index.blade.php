@extends('layouts.app')
@section('title', 'Data Mahasiswa')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-primary text-white d-flex justify-content-between">
    <h5 class="mb-0">Daftar Mahasiswa</h5>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-light btn-sm">Tambah Mahasiswa</a>
  </div>

  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered text-center align-middle">
      <thead class="table-primary">
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>NIM</th>
          <th>Prodi</th>
          <th>Fakultas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($mahasiswa as $i => $m)
          <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $m->nama }}</td>
            <td>{{ $m->nim }}</td>
            <td>{{ $m->prodi->nama_prodi }}</td>
            <td>{{ $m->prodi->fakultas->nama_fakultas }}</td>
            <td>
              <a href="{{ route('mahasiswa.edit', $m->id) }}" class="btn btn-success btn-sm">Edit</a>
              <form action="{{ route('mahasiswa.destroy', $m->id) }}" method="POST" style="display:inline;">
                @csrf @method('DELETE')
                <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-muted">Belum ada data mahasiswa</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
