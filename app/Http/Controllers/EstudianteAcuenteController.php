<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEstudianteAcuenteRequest;
use App\Http\Requests\UpdateEstudianteAcuenteRequest;
use App\Repositories\EstudianteAcuenteRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class EstudianteAcuenteController extends AppBaseController
{
    /** @var  EstudianteAcuenteRepository */
    private $estudianteAcuenteRepository;

    public function __construct(EstudianteAcuenteRepository $estudianteAcuenteRepo)
    {
        $this->estudianteAcuenteRepository = $estudianteAcuenteRepo;
    }

    /**
     * Display a listing of the EstudianteAcuente.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $estudianteAcuentes = $this->estudianteAcuenteRepository->all();

        return view('estudiante_acuentes.index')
            ->with('estudianteAcuentes', $estudianteAcuentes);
    }

    /**
     * Show the form for creating a new EstudianteAcuente.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('estudiante_acuentes.create');
    }

    /**
     * Store a newly created EstudianteAcuente in storage.
     *
     * @param CreateEstudianteAcuenteRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateEstudianteAcuenteRequest $request)
    {
        $input = $request->all();

        $estudianteAcuente = $this->estudianteAcuenteRepository->create($input);

        Flash::success('Estudiante Acuente saved successfully.');

        return redirect(route('estudianteAcuentes.index'));
    }

    /**
     * Display the specified EstudianteAcuente.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $estudianteAcuente = $this->estudianteAcuenteRepository->find($id);

        if (empty($estudianteAcuente)) {
            Flash::error('Estudiante Acuente not found');

            return redirect(route('estudianteAcuentes.index'));
        }

        return view('estudiante_acuentes.show')->with('estudianteAcuente', $estudianteAcuente);
    }

    /**
     * Show the form for editing the specified EstudianteAcuente.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $estudianteAcuente = $this->estudianteAcuenteRepository->find($id);

        if (empty($estudianteAcuente)) {
            Flash::error('Estudiante Acuente not found');

            return redirect(route('estudianteAcuentes.index'));
        }

        return view('estudiante_acuentes.edit')->with('estudianteAcuente', $estudianteAcuente);
    }

    /**
     * Update the specified EstudianteAcuente in storage.
     *
     * @param int $id
     * @param UpdateEstudianteAcuenteRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdateEstudianteAcuenteRequest $request)
    {
        $estudianteAcuente = $this->estudianteAcuenteRepository->find($id);

        if (empty($estudianteAcuente)) {
            Flash::error('Estudiante Acuente not found');

            return redirect(route('estudianteAcuentes.index'));
        }

        $estudianteAcuente = $this->estudianteAcuenteRepository->update($request->all(), $id);

        Flash::success('Estudiante Acuente updated successfully.');

        return redirect(route('estudianteAcuentes.index'));
    }

    /**
     * Remove the specified EstudianteAcuente from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $estudianteAcuente = $this->estudianteAcuenteRepository->find($id);

        if (empty($estudianteAcuente)) {
            Flash::error('Estudiante Acuente not found');

            return redirect(route('estudianteAcuentes.index'));
        }

        $this->estudianteAcuenteRepository->delete($id);

        Flash::success('Estudiante Acuente deleted successfully.');

        return redirect(route('estudianteAcuentes.index'));
    }
}
