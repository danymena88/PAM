<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = "producto";
    protected $primaryKey = "idproducto";
    public $timestamps = false;

    protected $fillable = [
         'created', 
         'isactive', 
         'nombre', 
         'codigo', 
         'idlinea_produccion'
    ];

    public function obtenerTodos()
    {
        return Producto::all();
    }

    public function crear(Producto $obj)
    {
       return $obj->save();
    }
}
