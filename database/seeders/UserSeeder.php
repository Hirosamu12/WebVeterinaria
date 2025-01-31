<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('usuario')->insert([
            'id_Usuario' => 1,
            'nombre_Usuario' => 'Jon',
            'apellido_Usuario' => 'Doe',
            'password' => bcrypt('123'),
            'cedula' => '123456',
            'email' => 'jondoe@gmail.com',
            'telefono' => '0981464646',
            'direccion' => 'casajondoe123',
            'id_Rol' => '1',
            'estado'=> 'activo',
        ]);
    }
}
    