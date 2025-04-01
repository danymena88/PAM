<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paquete;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        date_default_timezone_set('America/El_Salvador');
        Paquete::insert([
            'descripcionPaquete' => 'N/A',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
