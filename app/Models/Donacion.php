<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donacion extends Model
{
    protected $table = 'donation';

    protected $primaryKey = "id_Donacion";

    public $timestamps = false;
    protected $fillable = [
        'fecha_Donacion',
        'cantidad_Donacion',
        'lugar_Donacion',
        'estado_Donacion',
        'id_Mascota_Receptor',
        'id_Mascota_Donante',
    ];
}
