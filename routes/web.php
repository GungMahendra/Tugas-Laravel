<?php

use App\Http\Controllers\FakultasController;
use App\Http\Controllers\ProdiController;
use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('mahasiswa.index');
});

Route::resource('fakultas', FakultasController::class)->parameters(['fakultas' => 'fakultas']);
Route::resource('prodi', ProdiController::class)->parameters(['prodi' => 'prodi']);
Route::resource('mahasiswa', MahasiswaController::class)->parameters(['mahasiswa' => 'mahasiswa']);
