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
        'busquedas', 
        'crearUsuarios',
        'gestionarPaquetes',
        'modificarUsuarios'
    ];

    public function obtenerTodos()
    {
        return GruposUsuarios::orderBy('created_at', 'desc')->get();
    }

    public function obtenerTodos2()
    {
        return GruposUsuarios::get();
    }

    public function obtenerGrupo($id)
    {
        return GruposUsuarios::find($id);
    }

    public function delGrupo($idDelGrupo)
    {
        GruposUsuarios::destroy($idDelGrupo);
    }

    public static function nombreDelGrupo($id)
    {
        $rol = GruposUsuarios::find($id);
        return $rol->nombre;
    }

    public static function accesoAddUser($id)
    {
        $rol = GruposUsuarios::find($id);
        if ($rol->crearUsuarios == 'Y')
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function permisosGrupo($id_rol, $consulta)
    {
        switch ($consulta) {
            case 'env':
                $grupo = GruposUsuarios::find($id_rol);
                if ($grupo->hacerEnvios == 'Y'){
                    return 'Y';
                }else {
                    return 'N';
                }
                break;
            case 'modEnv':
                $grupo = GruposUsuarios::find($id_rol);
                if ($grupo->modificarPaquetes == 'Y'){
                    return 'Y';
                }else {
                    return 'N';
                }
                break;
            case 'user':
                $grupo = GruposUsuarios::find($id_rol);
                if ($grupo->crearUsuarios == 'Y'){
                    return 'Y';
                }else {
                    return 'N';
                }
                break;
            case 'modUser':
                $grupo = GruposUsuarios::find($id_rol);
                if ($grupo->modificarUsuarios == 'Y'){
                    return 'Y';
                }else {
                    return 'N';
                }
                break;
            case 'estSuc':
                $grupo = GruposUsuarios::find($id_rol);
                if ($grupo->estadisticasDeSuSucursal == 'Y'){
                    return 'Y';
                }else {
                    return 'N';
                }
                break;
            case 'estGlo':
                $grupo = GruposUsuarios::find($id_rol);
                if ($grupo->busquedas == 'Y'){
                    return 'Y';
                }else {
                    return 'N';
                }
                break;
            case 'gest':
                $grupo = GruposUsuarios::find($id_rol);
                if ($grupo->gestionarPaquetes == 'Y'){
                    return 'Y';
                }else {
                    return 'N';
                }
                break;
            case 'gestGlo':
                $grupo = GruposUsuarios::find($id_rol);
                if ($grupo->gestionarPaquetesGlobales == 'Y'){
                    return 'Y';
                }else {
                    return 'N';
                }
                break;
        }
    }

    public static function gruposConGestor()
    {
        return GruposUsuarios::where('gestionarPaquetes', 'Y')->get();
    }
}
