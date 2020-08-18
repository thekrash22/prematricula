<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateEstudianteAcuenteAPIRequest;
use App\Http\Requests\API\UpdateEstudianteAcuenteAPIRequest;
use App\Models\EstudianteAcuente;
use App\Repositories\EstudianteAcuenteRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class EstudianteAcuenteController
 * @package App\Http\Controllers\API
 */

class EstudianteAcuenteAPIController extends AppBaseController
{
    /** @var  EstudianteAcuenteRepository */
    private $estudianteAcuenteRepository;

    public function __construct(EstudianteAcuenteRepository $estudianteAcuenteRepo)
    {
        $this->estudianteAcuenteRepository = $estudianteAcuenteRepo;
    }

    /**
     * Display a listing of the EstudianteAcuente.
     * GET|HEAD /estudianteAcuentes
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $estudianteAcuentes = $this->estudianteAcuenteRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($estudianteAcuentes->toArray(), 'Estudiante Acuentes retrieved successfully');
    }

    /**
     * Store a newly created EstudianteAcuente in storage.
     * POST /estudianteAcuentes
     *
     * @param CreateEstudianteAcuenteAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreateEstudianteAcuenteAPIRequest $request)
    {
        $input = $request->all();

        $estudianteAcuente = $this->estudianteAcuenteRepository->create($input);

        return $this->sendResponse($estudianteAcuente->toArray(), 'Estudiante Acuente saved successfully');
    }

    /**
     * Display the specified EstudianteAcuente.
     * GET|HEAD /estudianteAcuentes/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var EstudianteAcuente $estudianteAcuente */
        $estudianteAcuente = $this->estudianteAcuenteRepository->find($id);

        if (empty($estudianteAcuente)) {
            return $this->sendError('Estudiante Acuente not found');
        }

        return $this->sendResponse($estudianteAcuente->toArray(), 'Estudiante Acuente retrieved successfully');
    }

    /**
     * Update the specified EstudianteAcuente in storage.
     * PUT/PATCH /estudianteAcuentes/{id}
     *
     * @param int $id
     * @param UpdateEstudianteAcuenteAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdateEstudianteAcuenteAPIRequest $request)
    {
        $input = $request->all();

        /** @var EstudianteAcuente $estudianteAcuente */
        $estudianteAcuente = $this->estudianteAcuenteRepository->find($id);

        if (empty($estudianteAcuente)) {
            return $this->sendError('Estudiante Acuente not found');
        }

        $estudianteAcuente = $this->estudianteAcuenteRepository->update($input, $id);

        return $this->sendResponse($estudianteAcuente->toArray(), 'EstudianteAcuente updated successfully');
    }

    /**
     * Remove the specified EstudianteAcuente from storage.
     * DELETE /estudianteAcuentes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var EstudianteAcuente $estudianteAcuente */
        $estudianteAcuente = $this->estudianteAcuenteRepository->find($id);

        if (empty($estudianteAcuente)) {
            return $this->sendError('Estudiante Acuente not found');
        }

        $estudianteAcuente->delete();

        return $this->sendSuccess('Estudiante Acuente deleted successfully');
    }
}
