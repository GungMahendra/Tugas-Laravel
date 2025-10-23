@extends('layouts.app')

@section('content')
<div class="container mt-5">
  <div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
      <h4 class="mb-0">Tambah Fakultas</h4>
    </div>
    <div class="card-body">
      <form action="{{ route('fakultas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
          <label for="nama_fakultas" class="form-label">Nama Fakultas</label>
          <input 
            type="text" 
            name="nama_fakultas" 
            id="nama_fakultas" 
            class="form-control @error('nama_fakultas') is-invalid @enderror" 
            placeholder="Masukkan nama fakultas"
            value="{{ old('nama_fakultas') }}" 
            required>
          @error('nama_fakultas')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="text-end">
          <a href="{{ route('fakultas.index') }}" class="btn btn-secondary">Batal</a>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endsection
