<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
            'descripcion'=>$this->faker->text(),
            'estado'=>$this->faker->randomElement(['Activo','Desactivado','Baneado']),
            'fecha_nac'=>$this->faker->date('Y_m_d'),
            'email' => fake()->unique()->safeEmail(),
            'bool_18'=>$this->faker->boolean(),
            'facebook'=>'@'.$this->faker->userName(),
            'twitter'=>'@'.$this->faker->userName(),
            'instagram'=>'@'.$this->faker->userName(),
            'telefono'=>$this->faker->phoneNumber(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10)
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
