<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Appel du seeder pour peupler la table domaines
        $this->call(DomainesTableSeeder::class);
        
        // Si vous avez d'autres seeders, vous pouvez les appeler ici
        // $this->call(OtherSeeder::class);
        
        // Exemple de création de 10 utilisateurs
        // \App\Models\User::factory(10)->create();
    }
}
