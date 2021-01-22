<?php

namespace Database\Factories;

use App\Models\Vitrine;
use Illuminate\Database\Eloquent\Factories\Factory;

class VitrineFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Vitrine::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'array_id_produtos' => $faker->randomElements($array = array ('1','2','3','4','5','6','7','8','9','10'), $count = 3),
        ];
    }
}
