<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GruposUsuarios extends Model
{
    use HasFactory;

    protected $table = 'rol_usuarios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre', 
        'descripcion',
        'hacerEnvios', 
        'modificarPaquetes', 
        'verEstadisticasGlobales', 
        'crearUsuarios',
        'estadisticasDeSuSucursal',
        'gestionarPaquetes',
        'gestionarPaquetesGlobales',
        'modificarUsuarios'
    ];

    public function obtenerTodos()
    {
        return GruposUsuarios::orderBy('created_at', 'desc')->get();
    }

    public function delGrupo($idDelGrupo)
    {
        GruposUsuarios::destroy($idDelGrupo);
    }
}
