<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Codigo;

class CodigosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        for ($i = 1; $i <= 100; $i++)
        {
            $codigo = str_pad($i, 4, "0", STR_PAD_LEFT);
            Codigo::insert([
                'codigo' => 'OSA001'.$codigo,
                'disponible' => 'Y',
                'impreso' => 'Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            Codigo::insert([
                'codigo' => 'SSO001'.$codigo,
                'disponible' => 'Y',
                'impreso' => 'Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

            Codigo::insert([
                'codigo' => 'OMU001'.$codigo,
                'disponible' => 'Y',
                'impreso' => 'Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
            Codigo::insert([
                'codigo' => 'SSA001'.$codigo,
                'disponible' => 'Y',
                'impreso' => 'Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);


            Codigo::insert([
                'codigo' => 'S29001'.$codigo,
                'disponible' => 'Y',
                'impreso' => 'Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
            Codigo::insert([
                'codigo' => 'SSM001'.$codigo,
                'disponible' => 'Y',
                'impreso' => 'Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
            Codigo::insert([
                'codigo' => 'SSV001'.$codigo,
                'disponible' => 'Y',
                'impreso' => 'Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
            Codigo::insert([
                'codigo' => 'SSO002'.$codigo,
                'disponible' => 'Y',
                'impreso' => 'Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);
            Codigo::insert([
                'codigo' => 'SSS001'.$codigo,
                'disponible' => 'Y',
                'impreso' => 'Y',
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")
            ]);

        }
    }
}
