<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Acudientes
 * @package App\Models
 * @version August 18, 2020, 4:28 pm UTC
 *
 * @property interger $persona_id
 * @property string $direccion
 * @property string $barrio
 * @property string $profesion
 * @property string $correo
 */
class Acudientes extends Model
{
    use SoftDeletes;

    public $table = 'acudientes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'persona_id',
        'direccion',
        'barrio',
        'profesion',
        'correo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'direccion' => 'string',
        'barrio' => 'string',
        'profesion' => 'string',
        'correo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'persona_id' => 'required',
        'direccion' => 'required',
        'barrio' => 'required',
        'profesion' => 'required',
        'correo' => 'required'
    ];

    
}
