<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Edit Mahasiswa</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('mahasiswa.update', $mahasiswa->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nim" class="form-label">NIM</label>
          <input type="number" name="nim" class="form-control" value="{{ old('nim', $mahasiswa->nim) }}" required>
        </div>

        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" name="nama" class="form-control" value="{{ old('nama', $mahasiswa->nama) }}" required>
        </div>

        <div class="mb-3">
          <label for="prodi_id" class="form-label">Prodi</label>
          <select name="prodi_id" class="form-select" required>
            @foreach($prodi as $p)
              <option value="{{ $p->id }}" {{ $mahasiswa->prodi_id == $p->id ? 'selected' : '' }}>
                {{ $p->nama_prodi }} ({{ $p->fakultas->nama_fakultas }})
              </option>
            @endforeach
          </select>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Kembali</a>
      </form>
    </div>
  </div>
</div>
</body>
</html>
