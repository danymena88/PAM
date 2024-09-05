<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Capitulo extends Model
{
    use HasFactory;

    protected $table = 'capitulos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'num_capitulo',
        'enlace_imagen', 
        'enlace_video',
        'descripcion',
        'id_curso', 
        'precio'
    ];

    public function capituloget($id_curso, $num)
    {
        return Capitulo::where('id_curso', '=', $id_curso)->where('num_capitulo', '=', $num)->first();
    }

    public function eliminarPorId(string $id)
    {
        Capitulo::destroy($id);
    }


}
