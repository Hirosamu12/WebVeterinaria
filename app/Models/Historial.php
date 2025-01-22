<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    protected $table = 'historial';

    protected $primaryKey = "id_Historial";

    public $timestamps = false;
    protected $fillable = [
        'fecha_Historial',
        'observaciones_Historial',
        'id_Mascota',
    ];
}
