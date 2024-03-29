<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desparasitacion extends Model
{
    use HasFactory;

    protected $table = 'desparasitacion';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'peso',
        'fecha_desparasitacion',
        'proxima_desparasitacion',
        'costo',
        'mascota_id',
        'veterinaria_id',
        'usuario_id',
    ];

    public function veterinaria(){
        return $this->belongsTo('App\Models\Veterinaria', 'veterinaria_id', 'id');
    }
}
