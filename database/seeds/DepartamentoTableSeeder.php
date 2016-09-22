<?php

use Illuminate\Database\Seeder;

class DepartamentoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	DB::table('departamentos')->insert([
            'nombre'        => 'Almacén',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('departamentos')->insert([
            'nombre'        => 'Aseo y limpieza',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('departamentos')->insert([
            'nombre'        => 'Carpintería',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('departamentos')->insert([
            'nombre'        => 'Electricidad',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('departamentos')->insert([
            'nombre'        => 'Herrería',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('departamentos')->insert([
            'nombre'        => 'Jardinería',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('departamentos')->insert([
            'nombre'        => 'Pintura',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('departamentos')->insert([
            'nombre'        => 'Plomería',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('departamentos')->insert([
            'nombre'        => 'Refrigeración',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

        DB::table('departamentos')->insert([
            'nombre'        => 'Taller mecánico',
            'notas'      	=> '',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);
    }
}
