<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateAcudientesAPIRequest;
use App\Http\Requests\API\UpdateAcudientesAPIRequest;
use App\Models\Acudientes;
use App\Repositories\AcudientesRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class AcudientesController
 * @package App\Http\Controllers\API
 */

class AcudientesAPIController extends AppBaseController
{
    /** @var  AcudientesRepository */
    private $acudientesRepository;

    public function __construct(AcudientesRepository $acudientesRepo)
    {
        $this->acudientesRepository = $acudientesRepo;
    }

    /**
     * Display a listing of the Acudientes.
     * GET|HEAD /acudientes
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $acudientes = $this->acudientesRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($acudientes->toArray(), 'Acudientes retrieved successfully');
    }

    /**
     * Store a newly created Acudientes in storage.
     * POST /acudientes
     *
     * @param CreateAcudientesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreateAcudientesAPIRequest $request)
    {
        $input = $request->all();

        $acudientes = $this->acudientesRepository->create($input);

        return $this->sendResponse($acudientes->toArray(), 'Acudientes saved successfully');
    }

    /**
     * Display the specified Acudientes.
     * GET|HEAD /acudientes/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var Acudientes $acudientes */
        $acudientes = $this->acudientesRepository->find($id);

        if (empty($acudientes)) {
            return $this->sendError('Acudientes not found');
        }

        return $this->sendResponse($acudientes->toArray(), 'Acudientes retrieved successfully');
    }

    /**
     * Update the specified Acudientes in storage.
     * PUT/PATCH /acudientes/{id}
     *
     * @param int $id
     * @param UpdateAcudientesAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdateAcudientesAPIRequest $request)
    {
        $input = $request->all();

        /** @var Acudientes $acudientes */
        $acudientes = $this->acudientesRepository->find($id);

        if (empty($acudientes)) {
            return $this->sendError('Acudientes not found');
        }

        $acudientes = $this->acudientesRepository->update($input, $id);

        return $this->sendResponse($acudientes->toArray(), 'Acudientes updated successfully');
    }

    /**
     * Remove the specified Acudientes from storage.
     * DELETE /acudientes/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var Acudientes $acudientes */
        $acudientes = $this->acudientesRepository->find($id);

        if (empty($acudientes)) {
            return $this->sendError('Acudientes not found');
        }

        $acudientes->delete();

        return $this->sendSuccess('Acudientes deleted successfully');
    }
}
