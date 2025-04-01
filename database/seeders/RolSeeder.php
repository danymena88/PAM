<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\GruposUsuarios;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        date_default_timezone_set('America/El_Salvador');
        GruposUsuarios::insert([
            'nombre' => 'Administrador',
            'descripcion' => 'Acceso total a configuraciones, búsquedas y estadísticas',
            'hacerEnvios' => 'Y',
            'modificarPaquetes' => 'Y',
            'busquedas' => 'Y',
            'crearUsuarios' => 'Y',
            'gestionarPaquetes' => 'Y',
            'modificarUsuarios' => 'Y',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        GruposUsuarios::insert([
            'nombre' => 'Usuario',
            'descripcion' => 'Acceso restringido, solo puede hacer envios',
            'hacerEnvios' => 'Y',
            'modificarPaquetes' => 'N',
            'busquedas' => 'N',
            'crearUsuarios' => 'N',
            'gestionarPaquetes' => 'N',
            'modificarUsuarios' => 'N',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        GruposUsuarios::insert([
            'nombre' => 'Pam',
            'descripcion' => 'Gestiona paquetes y ve estadísticas de la sucursal',
            'hacerEnvios' => 'Y',
            'modificarPaquetes' => 'N',
            'busquedas' => 'N',
            'crearUsuarios' => 'N',
            'gestionarPaquetes' => 'Y',
            'modificarUsuarios' => 'N',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        GruposUsuarios::insert([
            'nombre' => 'Usuario Básico',
            'descripcion' => 'Sólo puede recibir paquetes',
            'hacerEnvios' => 'N',
            'modificarPaquetes' => 'N',
            'busquedas' => 'N',
            'crearUsuarios' => 'N',
            'gestionarPaquetes' => 'N',
            'modificarUsuarios' => 'N',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
