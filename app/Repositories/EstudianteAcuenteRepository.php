<?php

namespace App\Repositories;

use App\Models\EstudianteAcuente;
use App\Repositories\BaseRepository;

/**
 * Class EstudianteAcuenteRepository
 * @package App\Repositories
 * @version August 18, 2020, 8:14 pm UTC
*/

class EstudianteAcuenteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'estudiante_id',
        'acudiente_id'
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
        return EstudianteAcuente::class;
    }
}
