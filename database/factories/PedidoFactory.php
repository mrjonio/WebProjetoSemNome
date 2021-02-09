<?php
namespace Database\Factories;

use App\Models\Farmacia;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\User;
use App\Models\Pedido;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PedidoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pedido::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'ativo' => $this->faker->randomElement([true, false]),
            'cliente_id' => $this->faker->numberBetween(1, 10),
            'farmacia_id' => $this->faker->numberBetween(1, 10),
            'produto_id' => $this->faker->numberBetween(1, 30),
        ];
    }
}
