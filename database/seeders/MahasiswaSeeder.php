<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        Mahasiswa::create(['nim' => '2305505001', 'nama' => 'Putu Agus', 'prodi_id' => 1]);
        Mahasiswa::create(['nim' => '2305405002', 'nama' => 'Made Cenik', 'prodi_id' => 2]);
        Mahasiswa::create(['nim' => '2305405003', 'nama' => 'Kadek Sari', 'prodi_id' => 1]);
    }
}
