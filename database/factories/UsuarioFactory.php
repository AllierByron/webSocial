<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\usuario>
 */
class UsuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nombre'=>$this->faker->name(),
            'descripcion'=>$this->faker->text(),
            'estado'=>$this->faker->randomElement(['Activo','Desactivado','Baneado']),
            'fecha_nac'=>$this->faker->date('Y_m_d'),
            'bool_18'=>strval($this->faker->boolean()),
            'facebook'=>'@'.$this->faker->userName(),
            'twitter'=>'@'.$this->faker->userName(),
            'instagram'=>'@'.$this->faker->userName(),
            'telefono'=>$this->faker->phoneNumber()
        ];
    }
}
