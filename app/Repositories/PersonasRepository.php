<?php

namespace App\Repositories;

use App\Models\Personas;
use App\Repositories\BaseRepository;

/**
 * Class PersonasRepository
 * @package App\Repositories
 * @version August 18, 2020, 2:40 pm UTC
*/

class PersonasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'documento',
        'primer_nombre',
        'segundo_nombre',
        'primer_apellido',
        'segundo_apellido'
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
        return Personas::class;
    }
}
