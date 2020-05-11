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

            'nombre' => 'carlos',
            'apellido' => 'beltran',
            'email' => 'carlos@gmail.com',
            'password' => bcrypt('12345678'),
            'estado_id' => 1,

        ]);

        TBLUsuario::create([

            'nombre' => 'camilo',
            'apellido' => 'hernadez',
            'email' => 'camilo@gmail.com',
            'password' => bcrypt('12345678'),
            'estado_id' => 1,

        ]);
    }
}
