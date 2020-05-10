<?php

use Illuminate\Database\Seeder;

use App\Models\TBLUsuario;

class TBLUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TBLUsuario::create([

            'nombre' => 'Carlos',
            'apellido_p' => 'Perez',
            'apellido_m' => 'Ortiz',
            'correo_electronico' => 'carlos@prueba.com',
            'contrasenia' => bcrypt('123456'),
            'estado_id' => 1,

        ]);
    }
}
