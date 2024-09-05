<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    protected $table = 'ventas';
    protected $primaryKey = 'id';

    protected $fillable = [
        'finaliza', 
        'pago',
        'id_curso', 
        'id_usuario'
    ];

    public function getVentaDeUser($id_usuario, $id_curso)
    {
        return Venta::where('id_curso', '=', $id_curso)
                            ->where('id_usuario', '=', $id_usuario)
                            ->first();
    }

    public function totalventas()
    {
        return Venta::join('cursos', 'ventas.id_curso', '=', 'cursos.id')
                        ->join('users', 'ventas.id_usuario', '=', 'users.id')
                        ->select('ventas.created_at', 'users.name', 'ventas.id', 'cursos.nombre', 'ventas.pago', 'ventas.finaliza')
                        ->orderBy('ventas.created_at', 'desc')
                        ->get();
    }

}
