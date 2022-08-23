<?php

namespace Database\Seeders;

use App\Models\Pengurus;
use Illuminate\Database\Seeder;

class PanitiaTesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pengurus::create([
            'name'    => 'Penguji',
            'jabatan' => 'PanitiaTes',
            'email'    => 'panitiates@gmail.com',
            'password'    => bcrypt('12345')
        ]);
    }
}
