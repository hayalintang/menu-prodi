<?php

namespace Database\Seeders;

use App\Models\Cpl;
use App\Models\Prodi;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CplSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prodis = Prodi::all();

        foreach ($prodis as $prodi) {
            Cpl::factory()->create(['kode_prodi' => $prodi->kode_prodi]);
        }
    }
}
