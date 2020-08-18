<?php

namespace App\Repositories;

use App\Models\Estudiantes;
use App\Repositories\BaseRepository;

/**
 * Class EstudiantesRepository
 * @package App\Repositories
 * @version August 18, 2020, 4:20 pm UTC
*/

class EstudiantesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'persona_id',
        'codigo',
        'grado',
        'eps',
        'cupo'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Estudiantes::class;
    }
}
