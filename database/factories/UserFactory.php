<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Endereco;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make('123123123'), // password
            'remember_token' => Str::random(10),
            'tipo_perfil' => $this->faker->randomElement(['Farmacia', 'Cliente']),
            'endereco_id' => Endereco::factory()->create()->id,
        ];
    }
}
