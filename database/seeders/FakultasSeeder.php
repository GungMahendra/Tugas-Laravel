<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fakultas;

class FakultasSeeder extends Seeder
{
    public function run(): void
    {
        Fakultas::create(['nama_fakultas' => 'Teknik']);
        Fakultas::create(['nama_fakultas' => 'Ekonomi']);
    }
}
