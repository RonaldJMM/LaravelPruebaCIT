<?php

use Illuminate\Database\Seeder;

use App\Models\TBLEstado;
use App\Models\TBLUsuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncateTables([
            'TBL_Comentario',
            'TBL_Plato',
            'TBL_Usuario',            
            'TBL_Estado',            
        ]);

        $this->call([

            TBLEstadoSeeder::class,
            TBLUsuarioSeeder::class,

        ]);
    }

    protected function truncateTables(array $tables){

        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');

    }
}
