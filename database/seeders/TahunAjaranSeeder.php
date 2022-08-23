<?php

namespace Database\Seeders;

use App\Models\Tahunajaran;
use Illuminate\Database\Seeder;

class TahunAjaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tahunajaran::create([
            'tahun_ajaran'    => '2022/2023',
        ]);
    }
}
