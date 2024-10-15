<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DomainesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('domaines')->insert([
            ['nom' => 'Domaine 1', 'logo' => 'logo1.png'],
            ['nom' => 'Domaine 2', 'logo' => 'logo2.png'],
            // Ajoutez d'autres domaines si nécessaire
        ]);
    }
}
