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
        $this->call(EnderecoSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(FarmaciaSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(VitrineSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
