<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    use HasFactory;

    protected $table = 'cursos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre', 
        'descripcion',
        'enlace_imagen', 
        'capitulos', 
        'precio', 
        'isactive'
    ];

    public function obtenerTodos()
    {
        return Curso::orderBy('created_at', 'desc')->get();
    }

    public function getById($id)
    {
        return Curso::find($id);
    }

    public function cursosActivos()
    {
        $conteo = Curso::where('isactive', 'Y')->get();
        return $conteo->count();
    }

    public function eliminarPorId($id)
    {
        Curso::destroy($id);
    }

    public function obtenerCapitulos()
    {
        return Curso::join('capitulos', 'cursos.id', '=', 'capitulos.id_curso')
                        ->select('capitulos.id', 'capitulos.num_capitulo', 'capitulos.descripcion', 'cursos.nombre', 'capitulos.created_at')
                        ->orderBy('cursos.nombre', 'desc')
                        ->get();
    }

    public function cursosInactivos()
    {
        $conteo = Curso::where('isactive', 'N')->get();
        return $conteo->count();
    }

    public function buscarXnombre(string $nombre)
    {
        $resultado = Curso::where('nombre', $nombre)->first();
        return $resultado;
    }
}
