<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ForumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('forums')->insert([
            'nombre' => 'veamos',
            'descripcion' => 'Comunidad dedicada a el mejor humor en internet',
            'estado' => 'Activo',
            'user_id' => 5
        ],[
            'nombre' => 'Otra comunidad',
            'descripcion' => 'La otra descripcion de la otra comunidad',
            'estado' => 'Activo',
            'user_id' => 8 
        ]);

    }
}
