<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\comunidad>
 */
class ComunidadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $users = DB::table('usuarios')->select('nombre')->get()->toArray();
        $owner = array_rand($users,1);

        return [
            'nombre'=>$this->faker->word(),
            'descripcion'=>$this->faker->text(),
            'estado'=>$this->faker->randomElement(['Activa','Desactivada','Baneada']),
            'owner'=>$owner
        ];
    }
}
