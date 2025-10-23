<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Fakultas</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Edit Fakultas</h4>
    </div>

    <div class="card-body">
      <form action="{{ route('fakultas.update', $fakultas->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
          <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
          <input 
            type="text" 
            name="nama_fakultas" 
            id="nama_fakultas" 
            class="form-control @error('nama_fakultas') is-invalid @enderror"
            value="{{ old('nama_fakultas', $fakultas->nama_fakultas) }}"
            required>

          @error('nama_fakultas')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="text-end">
          <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Perbarui</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
