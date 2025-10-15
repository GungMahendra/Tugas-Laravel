<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Tambah Mahasiswa</title>
</head>
<body>
  <h1>Tambah Mahasiswa</h1>

  @if ($errors->any())
    <div style="color:red;">
      <ul>
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="/mahasiswa" method="POST">
    @csrf
    <p>
      NIM: <input type="text" name="nim" value="{{ old('nim') }}">
    </p>
    <p>
      Nama: <input type="text" name="nama" value="{{ old('nama') }}">
    </p>
    <p>
      Prodi: <input type="text" name="prodi" value="{{ old('prodi') }}">
    </p>
    <button type="submit">Simpan</button>
  </form>

  <a href="/mahasiswa">← Kembali</a>
</body>
</html>
