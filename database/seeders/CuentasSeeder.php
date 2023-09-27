<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('cuentas')->insert([
            ['user' => 'admin','password' => Hash::make('admin1234'),'nombre' => 'Administrador','apellido' => 'Admin','perfil_id' => 1],
            ['user' => 'artista1','password' => Hash::make('artista1234'),'nombre' => 'Edward','apellido' => 'Hopper','perfil_id' => 2],
            ['user' => 'artista2','password' => Hash::make('artista1234'),'nombre' => 'Tamara','apellido' => 'Lempicka','perfil_id' => 2],
            ['user' => 'artista3','password' => Hash::make('artista1234'),'nombre' => 'Vincent','apellido' => 'van Gogh','perfil_id' => 2],
        ]);
    }
}


