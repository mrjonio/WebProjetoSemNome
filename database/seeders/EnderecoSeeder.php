
<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Endereco;

class EnderecoSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Endereco::factory()->count(10)->create();
    }
}
