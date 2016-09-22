<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicacion extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'comunicaciones';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['orden', 'fecha', 'numero_oficio', 'de', 'para', 'asunto'];
}
