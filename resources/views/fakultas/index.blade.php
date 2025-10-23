<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Fakultas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

{{-- ✅ Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('mahasiswa.index') }}">Sistem Akademik</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link {{ request()->is('mahasiswa*') ? 'active' : '' }}" href="{{ route('mahasiswa.index') }}">
            <i class="bi bi-people"></i> Mahasiswa
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('prodi*') ? 'active' : '' }}" href="{{ route('prodi.index') }}">
            <i class="bi bi-building"></i> Prodi
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ request()->is('fakultas*') ? 'active' : '' }}" href="{{ route('fakultas.index') }}">
            <i class="bi bi-bank"></i> Fakultas
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

{{-- ✅ Konten --}}
<div class="container mt-5">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
      <h4 class="mb-0">Daftar Fakultas</h4>
      <a href="{{ route('fakultas.create') }}" class="btn btn-light btn-sm">
        <i class="bi bi-plus-circle"></i> Tambah Fakultas
      </a>
    </div>

    <div class="card-body">
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <table class="table table-bordered align-middle text-center">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Nama Fakultas</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($fakultas as $index => $f)
            <tr>
              <td>{{ $index + 1 }}</td>
              <td>{{ $f->nama_fakultas }}</td>
              <td>
                <a href="{{ route('fakultas.edit', ['fakultas' => $f->id]) }}" class="btn btn-success btn-sm">
                  <i class="bi bi-pencil-square"></i> Edit
                </a>
                <form action="{{ route('fakultas.destroy', ['fakultas' => $f->id]) }}" method="POST" style="display:inline;">
                  @csrf
                  @method('DELETE')
                  <button type="submit" onclick="return confirm('Yakin ingin menghapus fakultas ini?')" class="btn btn-danger btn-sm">
                    <i class="bi bi-trash"></i> Hapus
                  </button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="3" class="text-muted">Belum ada data fakultas</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
