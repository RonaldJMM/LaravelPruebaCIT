<?php

use Illuminate\Database\Seeder;

use App\Models\TBLEstado;

class TBLEstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TBLEstado::create([

            'nombre' => 'Habilitado',

        ]);

        TBLEstado::create([

            'nombre' => 'Deshabilitado',

        ]);
    }
}
