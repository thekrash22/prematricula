<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Personas
 * @package App\Models
 * @version August 18, 2020, 2:40 pm UTC
 *
 * @property string $documento
 * @property string $primer_nombre
 * @property string $segundo_nombre
 * @property string $primer_apellido
 * @property string $segundo_apellido
 */
class Personas extends Model
{
    use SoftDeletes;

    public $table = 'personas';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'documento',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'documento' => 'string',
        'primer_nombre' => 'string',
        'segundo_nombre' => 'string',
        'primer_apellido' => 'string',
        'segundo_apellido' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'documento' => 'required',
        'primer_nombre' => 'required',
        'segundo_nombre' => 'required',
        'primer_apellido' => 'required',
        'segundo_apellido' => 'required'
    ];

    
}
