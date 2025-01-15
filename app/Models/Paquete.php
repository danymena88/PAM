<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    protected $table = 'paquete';
    protected $primaryKey = 'id';

    protected $fillable = [
        'descripcionPaquete'
        ];
    
    public $timestamps = false;


    public static function getDescripcion($id)
    {
        $des = Paquete::find($id);
        return $des->descripcionPaquete;
    }
}
