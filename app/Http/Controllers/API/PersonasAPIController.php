<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreatePersonasAPIRequest;
use App\Http\Requests\API\UpdatePersonasAPIRequest;
use App\Models\Personas;
use App\Repositories\PersonasRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class PersonasController
 * @package App\Http\Controllers\API
 */

class PersonasAPIController extends AppBaseController
{
    /** @var  PersonasRepository */
    private $personasRepository;

    public function __construct(PersonasRepository $personasRepo)
    {
        $this->personasRepository = $personasRepo;
    }

    /**
     * Display a listing of the Personas.
     * GET|HEAD /personas
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function index(Request $request)
    {
        $personas = $this->personasRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($personas->toArray(), 'Personas retrieved successfully');
    }

    /**
     * Store a newly created Personas in storage.
     * POST /personas
     *
     * @param CreatePersonasAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function store(CreatePersonasAPIRequest $request)
    {
        $input = $request->all();

        $personas = $this->personasRepository->create($input);

        return $this->sendResponse($personas->toArray(), 'Personas saved successfully');
    }

    /**
     * Display the specified Personas.
     * GET|HEAD /personas/{id}
     *
     * @param int $id
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function show($id)
    {
        /** @var Personas $personas */
        $personas = $this->personasRepository->find($id);

        if (empty($personas)) {
            return $this->sendError('Personas not found');
        }

        return $this->sendResponse($personas->toArray(), 'Personas retrieved successfully');
    }

    /**
     * Update the specified Personas in storage.
     * PUT/PATCH /personas/{id}
     *
     * @param int $id
     * @param UpdatePersonasAPIRequest $request
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function update($id, UpdatePersonasAPIRequest $request)
    {
        $input = $request->all();

        /** @var Personas $personas */
        $personas = $this->personasRepository->find($id);

        if (empty($personas)) {
            return $this->sendError('Personas not found');
        }

        $personas = $this->personasRepository->update($input, $id);

        return $this->sendResponse($personas->toArray(), 'Personas updated successfully');
    }

    /**
     * Remove the specified Personas from storage.
     * DELETE /personas/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\JsonResponse|Response
     */
    public function destroy($id)
    {
        /** @var Personas $personas */
        $personas = $this->personasRepository->find($id);

        if (empty($personas)) {
            return $this->sendError('Personas not found');
        }

        $personas->delete();

        return $this->sendSuccess('Personas deleted successfully');
    }
}
