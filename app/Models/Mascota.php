<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    protected $table = 'mascota'; // Specify table name if it's not `mascotas`

    protected $primaryKey = "id_Mascota";

    public $timestamps = false;
    protected $fillable = [
        'nombre_Mascota',
        'foto_Mascota',
        'fecha_Nacimiento',
        'genero',
        'raza_Mascota',
        'id_Sangre_Mascota',
        'id_Usuario',
    ];
}
