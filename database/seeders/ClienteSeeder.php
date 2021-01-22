<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Cliente;

class ClienteSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Cliente::factory()->count(10)->create();
    }
}
