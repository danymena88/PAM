<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Codigo extends Model
{
    use HasFactory;

    protected $table = 'codigos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'codigo',
        'disponible',
        'impreso'
        ];

    public $timestamps = false;


    public static function probarCodigo($codigo,$cod)
    {
        $verificacionUno = Codigo::where([['codigo','LIKE', $cod.'%'],['disponible','=','Y'],['impreso','=','Y']])->limit(3)->get();
        if (count($verificacionUno) > 0)
        {
            $verificacion = Codigo::where('codigo', $codigo)->first();
        if ($verificacion)
        {
            if ($verificacion->disponible == 'Y' && $verificacion->impreso == 'Y')
            {
                return 'aprobado';
            }
            else
            {
                return 'no disponible';
            }
        }
        else
        {
            return 'equivocado';
        }
        }
        else
        {
            return 'no hay';
        }
    }

    public static function getCodigo($codigo)
    {
        return Codigo::where('codigo', $codigo)->first();
    }

    public static function impresoNo($id)
    {
        $codigo = Codigo::find($id);
        $codigo->impreso = 'N';
        $codigo->save();
    }

    public static function codigosDeSucursal($cod)
    {
        return Codigo::where('codigo','LIKE', $cod.'%')->get();
    }

    public static function codigoPorId($id)
    {
        return Codigo::find($id);
    }
}
