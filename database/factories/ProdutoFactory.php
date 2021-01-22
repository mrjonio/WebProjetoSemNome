<?php

namespace Database\Factories;

use App\Models\Produto;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProdutoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Produto::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'nome' => $faker->name,
          'descricao' => $faker->text,
          'disponivel' => $faker->randomElement([True, False]),
          'preco' => $faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 100),
        ];
    }
}
