<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Farmacia;

class FarmaciaSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Farmacia::factory()->count(5)->create();
    }
}
