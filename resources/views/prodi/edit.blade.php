@extends('layouts.app')
@section('title', 'Edit Prodi')

@section('content')
<div class="card shadow-sm">
  <div class="card-header bg-warning text-white">Edit Program Studi</div>
  <div class="card-body">
    <form action="{{ route('prodi.update', $prodi->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div class="mb-3">
        <label>Nama Prodi</label>
        <input type="text" name="nama_prodi" class="form-control" value="{{ $prodi->nama_prodi }}" required>
      </div>

      <div class="mb-3">
        <label>Fakultas</label>
        <select name="fakultas_id" class="form-select" required>
          @foreach($fakultas as $f)
            <option value="{{ $f->id }}" {{ $prodi->fakultas_id == $f->id ? 'selected' : '' }}>
              {{ $f->nama_fakultas }}
            </option>
          @endforeach
        </select>
      </div>

      <button class="btn btn-warning text-white">Perbarui</button>
      <a href="{{ route('prodi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</div>
@endsection
