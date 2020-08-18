<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstudiantesRequest;
use App\Http\Requests\UpdateEstudiantesRequest;
use App\Repositories\EstudiantesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class EstudiantesController extends AppBaseController
{
    /** @var  EstudiantesRepository */
    private $estudiantesRepository;

    public function __construct(EstudiantesRepository $estudiantesRepo)
    {
        $this->estudiantesRepository = $estudiantesRepo;
    }

    /**
     * Display a listing of the Estudiantes.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $estudiantes = $this->estudiantesRepository->all();

        return view('estudiantes.index')
            ->with('estudiantes', $estudiantes);
    }

    /**
     * Show the form for creating a new Estudiantes.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('estudiantes.create');
    }

    /**
     * Store a newly created Estudiantes in storage.
     *
     * @param CreateEstudiantesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateEstudiantesRequest $request)
    {
        $input = $request->all();

        $estudiantes = $this->estudiantesRepository->create($input);

        Flash::success('Estudiantes saved successfully.');

        return redirect(route('estudiantes.index'));
    }

    /**
     * Display the specified Estudiantes.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $estudiantes = $this->estudiantesRepository->find($id);

        if (empty($estudiantes)) {
            Flash::error('Estudiantes not found');

            return redirect(route('estudiantes.index'));
        }

        return view('estudiantes.show')->with('estudiantes', $estudiantes);
    }

    /**
     * Show the form for editing the specified Estudiantes.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $estudiantes = $this->estudiantesRepository->find($id);

        if (empty($estudiantes)) {
            Flash::error('Estudiantes not found');

            return redirect(route('estudiantes.index'));
        }

        return view('estudiantes.edit')->with('estudiantes', $estudiantes);
    }

    /**
     * Update the specified Estudiantes in storage.
     *
     * @param int $id
     * @param UpdateEstudiantesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdateEstudiantesRequest $request)
    {
        $estudiantes = $this->estudiantesRepository->find($id);

        if (empty($estudiantes)) {
            Flash::error('Estudiantes not found');

            return redirect(route('estudiantes.index'));
        }

        $estudiantes = $this->estudiantesRepository->update($request->all(), $id);

        Flash::success('Estudiantes updated successfully.');

        return redirect(route('estudiantes.index'));
    }

    /**
     * Remove the specified Estudiantes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $estudiantes = $this->estudiantesRepository->find($id);

        if (empty($estudiantes)) {
            Flash::error('Estudiantes not found');

            return redirect(route('estudiantes.index'));
        }

        $this->estudiantesRepository->delete($id);

        Flash::success('Estudiantes deleted successfully.');

        return redirect(route('estudiantes.index'));
    }
}
