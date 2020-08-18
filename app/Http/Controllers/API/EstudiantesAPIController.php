<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEstudiantesAPIRequest;
use App\Http\Requests\API\UpdateEstudiantesAPIRequest;
use App\Models\Estudiantes;
use App\Repositories\EstudiantesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EstudiantesController
 * @package App\Http\Controllers\API
 */

class EstudiantesAPIController extends AppBaseController
{
    /** @var  EstudiantesRepository */
    private $estudiantesRepository;

    public function __construct(EstudiantesRepository $estudiantesRepo)
    {
        $this->estudiantesRepository = $estudiantesRepo;
    }

    /**
     * Display a listing of the Estudiantes.
     * GET|HEAD /estudiantes
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $estudiantes = $this->estudiantesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($estudiantes->toArray(), 'Estudiantes retrieved successfully');
    }

    /**
     * Store a newly created Estudiantes in storage.
     * POST /estudiantes
     *
     * @param CreateEstudiantesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreateEstudiantesAPIRequest $request)
    {
        $input = $request->all();

        $estudiantes = $this->estudiantesRepository->create($input);

        return $this->sendResponse($estudiantes->toArray(), 'Estudiantes saved successfully');
    }

    /**
     * Display the specified Estudiantes.
     * GET|HEAD /estudiantes/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var Estudiantes $estudiantes */
        $estudiantes = $this->estudiantesRepository->find($id);

        if (empty($estudiantes)) {
            return $this->sendError('Estudiantes not found');
        }

        return $this->sendResponse($estudiantes->toArray(), 'Estudiantes retrieved successfully');
    }

    /**
     * Update the specified Estudiantes in storage.
     * PUT/PATCH /estudiantes/{id}
     *
     * @param int $id
     * @param UpdateEstudiantesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdateEstudiantesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Estudiantes $estudiantes */
        $estudiantes = $this->estudiantesRepository->find($id);

        if (empty($estudiantes)) {
            return $this->sendError('Estudiantes not found');
        }

        $estudiantes = $this->estudiantesRepository->update($input, $id);

        return $this->sendResponse($estudiantes->toArray(), 'Estudiantes updated successfully');
    }

    /**
     * Remove the specified Estudiantes from storage.
     * DELETE /estudiantes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var Estudiantes $estudiantes */
        $estudiantes = $this->estudiantesRepository->find($id);

        if (empty($estudiantes)) {
            return $this->sendError('Estudiantes not found');
        }

        $estudiantes->delete();

        return $this->sendSuccess('Estudiantes deleted successfully');
    }
}
