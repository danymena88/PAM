<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Envio extends Model
{
    use HasFactory;

    protected $table = 'envio';
    protected $primaryKey = 'id';

    protected $fillable = [
        'aprobadoPamRemitente',
        'aprobadoPamDestino',
        'recibidoDestinatario',
        'sucRemitente',
        'sucDestinatario',
        'fechaRecibido',
        'idRemitente',
        'idDestinatario',
        'anulado',
        'idDescripcionPaquete',
        'idCodigoPaquete'
        ];
    


    public static function recientesPorUsuario($id)
    {
        return Envio::select('idDestinatario')->where('idRemitente', $id)
        ->groupByRaw('idDestinatario')->having('idDestinatario', '>', 1)->get();
    }

    public static function enviosEnProceso($id)
    {
        return Envio::where([
            ['idDestinatario', '=', $id],
            ['aprobadoPamDestino', '=', 'N']])->get();
    }

    public static function listoParaRetirar($id)
    {
        return Envio::where([
            ['idDestinatario', '=', $id],
            ['recibidoDestinatario', '=', 'N'],
            ['aprobadoPamDestino', '=', 'Y']])->get();
    }

    public static function recibidosMes($id)
    {
        date_default_timezone_set('America/El_Salvador');
        $from = new DateTime('now');
        $to = new DateTime('now');
        $from->modify('first day of this month');
        $to->modify('last day of this month');
        return Envio::where([
            ['idDestinatario', '=', $id],
            ['recibidoDestinatario', '=', 'Y']])->whereBetween('fechaRecibido', [$from, $to])->get();
    }


    public static function envioSaliente($fragmento)
    {
        return Envio::join('codigos','envio.idCodigoPaquete','=','codigos.id')
                        ->where([['codigos.codigo','LIKE', $fragmento.'%'],
                        ['aprobadoPamRemitente','=','N']])->first();
    }

    public static function enviosAdminJoin($id)
    {
        return Envio::join('users','envio.idRemitente','=','users.id')
                    ->join('sucursal','envio.sucRemitente','=','sucursal.id')
                    ->join('paquete','envio.idDescripcionPaquete','=','paquete.id')
                    ->select('users.primerNombre','users.segundoNombre','users.primerApellido','users.segundoApellido','users.apellidoCasada','sucursal.nombreSucursal','paquete.descripcionPaquete','envio.*')
                        ->where([['envio.idDestinatario','=', $id],
                        ['envio.recibidoDestinatario','=','N']])->get();
    }


    public static function enviosGestores($id_sucursal)
    {
        return Envio::join('users','envio.idRemitente','=','users.id')
        ->join('sucursal','envio.sucRemitente','=','sucursal.id')
        ->join('paquete','envio.idDescripcionPaquete','=','paquete.id')
        ->join('codigos','envio.idCodigoPaquete','=','codigos.id')
        ->select('users.primerNombre','users.segundoNombre','codigos.codigo','users.primerApellido','users.segundoApellido','users.apellidoCasada','sucursal.nombreSucursal','paquete.descripcionPaquete','envio.*')
        ->where([['aprobadoPamRemitente','=','N'],['anulado','=','N'],['sucRemitente','=',$id_sucursal]])->orderBy('id','asc')->get();
    }

    public static function enviosEntrantesGestores($id_sucursal)
    {
        return Envio::join('users','envio.idDestinatario','=','users.id')
        ->join('sucursal','envio.sucDestinatario','=','sucursal.id')
        ->join('paquete','envio.idDescripcionPaquete','=','paquete.id')
        ->join('codigos','envio.idCodigoPaquete','=','codigos.id')
        ->select('users.primerNombre','users.segundoNombre','codigos.codigo','users.primerApellido','users.segundoApellido','users.apellidoCasada','sucursal.nombreSucursal','paquete.descripcionPaquete','envio.*')
        ->where([['aprobadoPamDestino','=','N'],['aprobadoPamRemitente','=','Y'],['sucDestinatario','=',$id_sucursal]])->orderBy('id','asc')->get();
    }

    public static function getEnvioModal($id)
    {
        return Envio::join('users','envio.idRemitente','=','users.id')->join('codigos','envio.idCodigoPaquete','=','codigos.id')->join('sucursal','envio.sucRemitente','=','sucursal.id')
        ->join('paquete','envio.idDescripcionPaquete','=','paquete.id')->select('users.primerNombre','users.primerApellido','sucursal.nombreSucursal','paquete.descripcionPaquete','envio.*','codigos.codigo')
        ->find($id);
    }


    public static function enviosTerminadosJoin($id)
    {
        return Envio::join('users','envio.idDestinatario','=','users.id')
                    ->join('sucursal','envio.sucDestinatario','=','sucursal.id')
                    ->join('paquete','envio.idDescripcionPaquete','=','paquete.id')
                    ->join('codigos','envio.idCodigoPaquete','=','codigos.id')
                    ->select('users.primerNombre','users.segundoNombre','users.primerApellido','codigos.codigo','users.segundoApellido','users.apellidoCasada','sucursal.nombreSucursal','paquete.descripcionPaquete','envio.*')
                        ->where('envio.idRemitente','=', $id)->orderBy('created_at', 'desc')->get();
    }

    public static function enviosRecibidosMes($id)
    {
        return Envio::where([['idDestinatario','=',$id],['recibidoDestinatario','=','Y']])->orderBy('fechaRecibido', 'desc')->get();
    }

    public static function getEnvio($id)
    {
        return Envio::find($id);
    }

    public static function getEnvioRemi($id)
    {
        return Envio::join('users','envio.idRemitente','=','users.id')
                    ->join('sucursal','envio.sucRemitente','=','sucursal.id')
                    ->join('paquete','envio.idDescripcionPaquete','=','paquete.id')
                    ->join('codigos','envio.idCodigoPaquete','=','codigos.id')
                    ->select('users.primerNombre','users.segundoNombre','users.primerApellido','codigos.codigo','users.segundoApellido','users.apellidoCasada','sucursal.nombreSucursal','paquete.descripcionPaquete','envio.*')->find($id);
    }

}
