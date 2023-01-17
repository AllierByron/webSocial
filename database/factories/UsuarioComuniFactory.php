<?php

namespace Database\Factories;
use Illuminate\Support\Facades\DB;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\usuario_comuni>
 */
class UsuarioComuniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $idUser = DB::table('comunidads')->select($colums = ['id','owner'])->get()->toArray();
        
        return [
            'ID_usuario'=>,
            'ID_com'=>,
            'estado'=>$this->faker->randomElement(['Activo','Desactivado','Baneado'])
        ];
    }
}
