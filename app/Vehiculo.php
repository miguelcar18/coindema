<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vehiculos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['unidad', 'marca', 'modelo', 'placa', 'serial', 'carroceria', 'serial_motor', 'color', 'departamento', 'estado'];

    public function nombreDepartamento()
    {
        return $this->hasOne('App\Departamento', 'id', 'departamento');
    }
}
