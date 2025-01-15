<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        date_default_timezone_set('America/El_Salvador');
        User::insert([
            'primerNombre' => 'Daniel',
            'segundoNombre' => 'Edgardo',
            'primerApellido' => 'Mena',
            'segundoApellido' => 'Martínez',
            'genero' => 'M',
            'email' => 'danymena88@gmail.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Consultor',
            'id_rol_usuarios' => 1,
            'id_sucursal' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        User::insert([
            'primerNombre' => 'Reina',
            'segundoNombre' => 'de los Ángeles',
            'primerApellido' => 'Alvarenga',
            'genero' => 'F',
            'email' => 'reina.alvarenga@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Jefe de Agencia',
            'id_rol_usuarios' => 3,
            'id_sucursal' => 2,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        User::insert([
            'primerNombre' => 'Juan',
            'segundoNombre' => 'Anibal',
            'primerApellido' => 'Perez',
            'genero' => 'M',
            'email' => 'juan.perez@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Contador',
            'id_rol_usuarios' => 3,
            'id_sucursal' => 3,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        User::insert([
            'primerNombre' => 'Sandro',
            'segundoNombre' => 'Nahaaman',
            'primerApellido' => 'Morán',
            'genero' => 'M',
            'email' => 'sandro.moran@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Jefe',
            'id_rol_usuarios' => 3,
            'id_sucursal' => 4,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
