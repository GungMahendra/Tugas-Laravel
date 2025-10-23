<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Prodi</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-primary text-white">
      <h4>Tambah Prodi</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('prodi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label class="form-label">Nama Prodi</label>
          <input type="text" name="nama_prodi" class="form-control" required>
          @error('nama_prodi')
            <div class="text-danger small">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label class="form-label">Fakultas</label>
          <select name="fakultas_id" class="form-select" required>
            <option value="">-- Pilih Fakultas --</option>
            @foreach($fakultas as $f)
              <option value="{{ $f->id }}">{{ $f->nama_fakultas }}</option>
            @endforeach
          </select>
          @error('fakultas_id')
            <div class="text-danger small">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
