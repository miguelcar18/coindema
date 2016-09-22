<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'          => 'Miguel Carmona',
            'username'      => 'miguelcar18',
            'email'         => 'miguelcar18@gmail.com',
            'password'      => bcrypt('1234'),
            'path'          => '2016-09-18 05:26:2225miguel.jpeg',
            'rol'           => '1',
            'details'       => 'Datos usuario administrador',
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);
    }
}
