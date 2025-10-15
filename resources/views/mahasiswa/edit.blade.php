<form action="/mahasiswa/{{ $m['id'] }}" method="POST">
  @csrf
  @method('PUT')   <!-- Tambahkan baris ini -->
  <p>
    NIM: <input type="text" name="nim" value="{{ $m['nim'] }}">
  </p>
  <p>
    Nama: <input type="text" name="nama" value="{{ $m['nama'] }}">
  </p>
  <p>
    Prodi: <input type="text" name="prodi" value="{{ $m['prodi'] }}">
  </p>
  <button type="submit">Update</button>
</form>
