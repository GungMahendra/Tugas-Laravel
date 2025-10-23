<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Prodi;

class ProdiSeeder extends Seeder
{
    public function run(): void
    {
        Prodi::create(['nama_prodi' => 'Teknologi Informasi', 'fakultas_id' => 1]);
        Prodi::create(['nama_prodi' => 'Teknik Elektro', 'fakultas_id' => 1]);
        Prodi::create(['nama_prodi' => 'Manajemen', 'fakultas_id' => 2]);
    }
}
