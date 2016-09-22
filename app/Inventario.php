<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'inventarios';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['producto', 'modelo', 'marca', 'cantidad', 'serial', 'observaciones', 'departamento'];

    public function nombreDepartamento()
    {
        return $this->hasOne('App\Departamento', 'id', 'departamento');
    }
}
