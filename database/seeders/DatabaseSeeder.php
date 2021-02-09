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
        #$this->call(EnderecoSeeder::class);
        $this->call(VitrineSeeder::class);
        $this->call(ProdutoSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(PedidoSeeder::class);


        // \App\Models\User::factory(10)->create();
    }
}
