<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Vitrine;

class VitrineSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Vitrine::factory()->count(10)->create();
    }
}
