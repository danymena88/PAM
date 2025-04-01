<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Envio;

class EnvioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public static function run(): void
    {
        date_default_timezone_set('America/El_Salvador');
        Envio::insert([
            'aprobadoPamRemitente' => 'Y',
            'aprobadoPamDestino' => 'N',
            'recibidoDestinatario' => 'N',
            'sucRemitente' => 1,
            'sucDestinatario' => 9,
            'idRemitente' => 1,
            'idDestinatario' => 12,
            'anulado' => 'N',
            'idDescripcionPaquete' => 1,
            'idCodigoPaquete' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        date_default_timezone_set('America/El_Salvador');
        Envio::insert([
            'aprobadoPamRemitente' => 'N',
            'aprobadoPamDestino' => 'N',
            'recibidoDestinatario' => 'N',
            'sucRemitente' => 2,
            'sucDestinatario' => 8,
            'idRemitente' => 2,
            'idDestinatario' => 8,
            'anulado' => 'N',
            'idDescripcionPaquete' => 1,
            'idCodigoPaquete' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        date_default_timezone_set('America/El_Salvador');
        Envio::insert([
            'aprobadoPamRemitente' => 'N',
            'aprobadoPamDestino' => 'N',
            'recibidoDestinatario' => 'N',
            'sucRemitente' => 3,
            'sucDestinatario' => 7,
            'idRemitente' => 3,
            'idDestinatario' => 7,
            'anulado' => 'N',
            'idDescripcionPaquete' => 1,
            'idCodigoPaquete' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        date_default_timezone_set('America/El_Salvador');
        Envio::insert([
            'aprobadoPamRemitente' => 'N',
            'aprobadoPamDestino' => 'N',
            'recibidoDestinatario' => 'N',
            'sucRemitente' => 4,
            'sucDestinatario' => 6,
            'idRemitente' => 4,
            'idDestinatario' => 6,
            'anulado' => 'N',
            'idDescripcionPaquete' => 1,
            'idCodigoPaquete' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        date_default_timezone_set('America/El_Salvador');
        Envio::insert([
            'aprobadoPamRemitente' => 'N',
            'aprobadoPamDestino' => 'N',
            'recibidoDestinatario' => 'N',
            'sucRemitente' => 5,
            'sucDestinatario' => 4,
            'idRemitente' => 5,
            'idDestinatario' => 4,
            'anulado' => 'N',
            'idDescripcionPaquete' => 1,
            'idCodigoPaquete' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        date_default_timezone_set('America/El_Salvador');
        Envio::insert([
            'aprobadoPamRemitente' => 'N',
            'aprobadoPamDestino' => 'N',
            'recibidoDestinatario' => 'N',
            'sucRemitente' => 6,
            'sucDestinatario' => 4,
            'idRemitente' => 6,
            'idDestinatario' => 3,
            'anulado' => 'N',
            'idDescripcionPaquete' => 1,
            'idCodigoPaquete' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);



        date_default_timezone_set('America/El_Salvador');
        Envio::insert([
            'aprobadoPamRemitente' => 'N',
            'aprobadoPamDestino' => 'N',
            'recibidoDestinatario' => 'N',
            'sucRemitente' => '7',
            'sucDestinatario' => 3,
            'idRemitente' => 7,
            'idDestinatario' => 2,
            'anulado' => 'N',
            'idDescripcionPaquete' => 1,
            'idCodigoPaquete' => 1,
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);
    }
}
