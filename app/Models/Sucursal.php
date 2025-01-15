<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

    protected $table = 'sucursal';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombreSucursal', 
        'codigoSucursal'
        ];

    public function obtenerTodos()
    {
        return Sucursal::orderBy('created_at', 'desc')->get();
    }

    public static function nombreDeSucursal($id)
    {
        $suc = Sucursal::find($id);
        return $suc->nombreSucursal;
    }

    public static function obtenerCodigo($id)
    {
        $find = Sucursal::find($id);
        return $find->codigoSucursal;
    }

    public static function fragmento($id_sucursal)
    {
        $obj = Sucursal::find($id_sucursal);
        return substr($obj->codigoSucursal,0,6);
    }

    public static function sucursalDestinatario($id)
    {
        $encontrado = Sucursal::find($id);
        return $encontrado->nombreSucursal;
    }

}
