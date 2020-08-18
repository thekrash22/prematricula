<?php

namespace App\Repositories;

use App\Models\Acudientes;
use App\Repositories\BaseRepository;

/**
 * Class AcudientesRepository
 * @package App\Repositories
 * @version August 18, 2020, 4:28 pm UTC
*/

class AcudientesRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'persona_id',
        'direccion',
        'barrio',
        'profesion',
        'correo'
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
        return Acudientes::class;
    }
}
