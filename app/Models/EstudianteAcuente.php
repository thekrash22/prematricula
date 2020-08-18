<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EstudianteAcuente
 * @package App\Models
 * @version August 18, 2020, 8:14 pm UTC
 *
 * @property interger $estudiante_id
 * @property interger $acudiente_id
 */
class EstudianteAcuente extends Model
{
    use SoftDeletes;

    public $table = 'estudiante_acuentes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'estudiante_id',
        'acudiente_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'estudiante_id' => 'required',
        'acudiente_id' => 'required'
    ];

    
}
