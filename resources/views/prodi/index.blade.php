@extends('layouts.app')
@section('title', 'Data Prodi')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
    <h5 class="mb-0">Daftar Program Studi</h5>
    <a href="{{ route('prodi.create') }}" class="btn btn-light btn-sm">+ Tambah Prodi</a>
  </div>

  <div class="card-body">
    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered align-middle text-center">
      <thead class="table-primary">
        <tr>
          <th>No</th>
          <th>Nama Prodi</th>
          <th>Fakultas</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($prodi as $i => $p)
          <tr>
            <td>{{ $i + 1 }}</td>
            <td>{{ $p->nama_prodi }}</td>
            <td>{{ $p->fakultas->nama_fakultas }}</td>
            <td>
              <a href="{{ route('prodi.edit', $p->id) }}" class="btn btn-success btn-sm">Edit</a>
              <form action="{{ route('prodi.destroy', $p->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">Hapus</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="4" class="text-muted">Belum ada data prodi.</td></tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
