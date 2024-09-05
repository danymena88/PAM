<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccesoUsuario extends Model
{
    use HasFactory;

    protected $table = "acceso_usuario";
    protected $primaryKey = "idacceso_usuario";
    public $timestamps = false;

    public function obtenerPorId(int $user_id)
    {
        return AccesoUsuario::select('acceso_usuario.user_id', 'users.name', 'roles.nombre')
                            ->join('users', 'users.id', '=', 'acceso_usuario.user_id')
                            ->join('roles', 'roles.idrol', '=', 'acceso_usuario.idrol')
                            ->where('acceso_usuario.user_id', $user_id)
                            ->where('acceso_usuario.isactive', 'Y')
                            ->first();
    }
}
