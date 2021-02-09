<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClienteFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Cliente::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'cpf' => $this->faker->unique()->randomElement(['12345678910', '22345678910', '22245678910', '32345678910', '42345678910', '52345678910', '62345678910', '72345678910', '92345678910', '29345678910', '22345678911']),
          'user_id' => User::factory()->create()->id,
        ];
    }
}
