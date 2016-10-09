<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'permisos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['cedula', 'nombre', 'cargo', 'tipo_personal', 'adscrito', 'tipo_permiso', 'duracion', 'desde', 'hasta', 'suplente', 'aprobacion'];
}
