<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sucursal;

class SucursalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        date_default_timezone_set('America/El_Salvador');
        Sucursal::insert([
            'nombreSucursal' => 'Oficina Santa Ana',
            'codigoSucursal' => 'OSA001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        Sucursal::insert([
            'nombreSucursal' => 'Sucursal Sonsonate',
            'codigoSucursal' => 'SSO001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        Sucursal::insert([
            'nombreSucursal' => 'Oficinas MUCA',
            'codigoSucursal' => 'OMU001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        Sucursal::insert([
            'nombreSucursal' => 'Sucursal Santa Ana',
            'codigoSucursal' => 'SSA001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);







        Sucursal::insert([
            'nombreSucursal' => 'Sucursal 29 Calle',
            'codigoSucursal' => 'S29001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        Sucursal::insert([
            'nombreSucursal' => 'Sucursal San Miguel',
            'codigoSucursal' => 'SSM001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        Sucursal::insert([
            'nombreSucursal' => 'Sucursal San Vicente',
            'codigoSucursal' => 'SSV001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        Sucursal::insert([
            'nombreSucursal' => 'Sucursal Sonsonate 2',
            'codigoSucursal' => 'SSO002',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);


        Sucursal::insert([
            'nombreSucursal' => 'Sucursal San Salvador',
            'codigoSucursal' => 'SSS001',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
