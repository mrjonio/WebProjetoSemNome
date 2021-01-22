<?php

namespace Database\Factories;

use App\Models\User;
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
            'nome' => $this->faker->name,
            'email' => $this->faker ->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '123123123', // password
            'remember_token' => Str::random(10),
            'tipo_perfil' => $this->faker->randomElement(['Farmacia', 'Cliente']),
            'endereco_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
