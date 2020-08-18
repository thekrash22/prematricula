<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Estudiantes
 * @package App\Models
 * @version August 18, 2020, 4:20 pm UTC
 *
 * @property integer $persona_id
 * @property string $codigo
 * @property string $grado
 * @property string $eps
 * @property string $cupo
 */
class Estudiantes extends Model
{
    use SoftDeletes;

    public $table = 'estudiantes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'persona_id',
        'codigo',
        'grado',
        'eps',
        'cupo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'persona_id' => 'integer',
        'codigo' => 'string',
        'grado' => 'string',
        'eps' => 'string',
        'cupo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'persona_id' => 'required',
        'codigo' => 'required',
        'grado' => 'required',
        'eps' => 'required',
        'cupo' => 'required'
    ];

    
}
