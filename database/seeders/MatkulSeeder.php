<?php

namespace Database\Seeders;

use App\Models\Prodi;
use App\Models\Matkul;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = Prodi::all();

        foreach ($prodis as $prodi) {
            Matkul::factory()->create(['kode_prodi' => $prodi->kode_prodi]);
        }
    }
}
