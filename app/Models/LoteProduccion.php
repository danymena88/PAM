<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoteProduccion extends Model
{
    use HasFactory;

    protected $table = 'lote_produccion';
    protected $primaryKey = 'idlote_produccion';
    public $timestamps = false;

    protected $fillable = [
        'created', 
        'isactive', 
        'nombre', 
        'fecha_produccion', 
        'fecha_analisis', 
        'idproducto'
    ];
}
