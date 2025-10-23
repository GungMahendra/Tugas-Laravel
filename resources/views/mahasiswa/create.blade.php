<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Tambah Mahasiswa</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('mahasiswa.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="number" name="nim" class="form-control" value="{{ old('nim') }}" required>
          @error('nim') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
          @error('nama') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <div class="mb-3">
          <label for="prodi_id" class="form-label">Prodi</label>
          <select name="prodi_id" class="form-select" required>
            <option value="">-- Pilih Prodi --</option>
            @foreach($prodi as $p)
              <option value="{{ $p->id }}">{{ $p->nama_prodi }} ({{ $p->fakultas->nama_fakultas }})</option>
            @endforeach
          </select>
          @error('prodi_id') <div class="text-danger small">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
