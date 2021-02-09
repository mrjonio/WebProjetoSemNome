<?php

namespace Database\Factories;

use App\Models\Produto;
use App\Models\Vitrine;
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
          'imagem' => '/public/produtos/1/1AEuujQl4L7hf4CuxAXI0wNi043DZnP77IShCEEw.jpg',
          'nome' => $this->faker->name,
          'descricao' => $this->faker->text,
          'disponivel' => $this->faker->randomElement([true, false]),
          'preco' => $this->faker->randomFloat($nbMaxDecimals = 3, $min = 0, $max = 100),
          'vitrine_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
