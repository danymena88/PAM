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



        date_default_timezone_set('America/El_Salvador');
        User::insert([
            'primerNombre' => 'Maynor',
            'segundoNombre' => '',
            'primerApellido' => 'Lopez',
            'segundoApellido' => '',
            'genero' => 'M',
            'email' => 'maynor.lopez@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Jefe de Informática',
            'id_rol_usuarios' => 3,
            'id_sucursal' => 5,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        User::insert([
            'primerNombre' => 'Natalia',
            'segundoNombre' => 'Abigail',
            'primerApellido' => 'Reyes',
            'genero' => 'F',
            'email' => 'natalia.reyes@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Jefe de Agencia',
            'id_rol_usuarios' => 3,
            'id_sucursal' => 6,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        User::insert([
            'primerNombre' => 'Roberto',
            'segundoNombre' => 'Carlos',
            'primerApellido' => 'García',
            'genero' => 'M',
            'email' => 'roberto.garcia@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Contador',
            'id_rol_usuarios' => 3,
            'id_sucursal' => 7,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        User::insert([
            'primerNombre' => 'Jorge',
            'segundoNombre' => 'Alexander',
            'primerApellido' => 'Diaz',
            'genero' => 'M',
            'email' => 'jorge.diaz@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Jefe',
            'id_rol_usuarios' => 3,
            'id_sucursal' => 8,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        date_default_timezone_set('America/El_Salvador');
        User::insert([
            'primerNombre' => 'Alex',
            'segundoNombre' => 'Fernando',
            'primerApellido' => 'Martínez',
            'genero' => 'M',
            'email' => 'alex.martinez@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Consultor',
            'id_rol_usuarios' => 3,
            'id_sucursal' => 9,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        User::insert([
            'primerNombre' => 'Maria',
            'segundoNombre' => 'Emepetriz',
            'primerApellido' => 'Cardona',
            'genero' => 'F',
            'email' => 'maria.cardona@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Jefe de Agencia',
            'id_rol_usuarios' => 2,
            'id_sucursal' => 8,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        User::insert([
            'primerNombre' => 'Gustavo',
            'segundoNombre' => 'Adolfo',
            'primerApellido' => 'Munguia',
            'genero' => 'M',
            'email' => 'gustavo.munguia@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Contador',
            'id_rol_usuarios' => 2,
            'id_sucursal' => 7,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        User::insert([
            'primerNombre' => 'Jonathan',
            'segundoNombre' => 'Ernesto',
            'primerApellido' => 'Castro',
            'genero' => 'M',
            'email' => 'jonathan.castro@partsplussv.com',
            'password' => '$2y$12$LoBLNQT5Sjl6f15omJI5X.6bRQVJ/Lk3sBbBAOZpVnsJJdTyEy7GW',
            'cargo' => 'Jefe',
            'id_rol_usuarios' => 2,
            'id_sucursal' => 9,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
