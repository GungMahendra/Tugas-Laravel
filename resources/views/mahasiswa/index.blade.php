<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Data Mahasiswa</title>
</head>
<body>
  <h1>Daftar Mahasiswa</h1>

  @if(session('success'))
    <p style="color: green;">{{ session('success') }}</p>
  @endif

  @if(session('error'))
    <p style="color: red;">{{ session('error') }}</p>
  @endif

  <a href="/mahasiswa/create">+ Tambah Mahasiswa</a>
  <ul>
    @foreach($mahasiswa as $m)
      <li>
        {{ $m['nim'] }} - {{ $m['nama'] }} ({{ $m['prodi'] }})
        <a href="/mahasiswa/{{ $m['id'] }}/edit">Edit</a>
        <form action="/mahasiswa/{{ $m['id'] }}" method="POST" style="display:inline;">
  @csrf
  @method('DELETE')
  <button type="submit" onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
</form>

      </li>
    @endforeach
  </ul>
</body>
</html>
