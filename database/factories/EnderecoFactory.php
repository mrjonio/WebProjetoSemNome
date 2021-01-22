<?php

namespace Database\Factories;

use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cidade' => $this->faker->name,
            'estado' => $this->faker->name, 
            'rua' => $this->faker->name,
            'bairro' => $this->faker->lastName,
            'numero' => $this->faker->numberBetween(1, 1000),
            'cep' => $this->faker->adress,
            'complemento' => $this->faker->text,

        ];
    }
}
