<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>@yield('title')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('mahasiswa.index') }}">Sistem Akademik</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="{{ route('mahasiswa.index') }}">Mahasiswa</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('prodi.index') }}">Prodi</a></li>
        <li class="nav-item"><a class="nav-link" href="{{ route('fakultas.index') }}">Fakultas</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container mt-4">
  @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
