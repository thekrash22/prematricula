<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAcudientesRequest;
use App\Http\Requests\UpdateAcudientesRequest;
use App\Repositories\AcudientesRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use Response;

class AcudientesController extends AppBaseController
{
    /** @var  AcudientesRepository */
    private $acudientesRepository;

    public function __construct(AcudientesRepository $acudientesRepo)
    {
        $this->acudientesRepository = $acudientesRepo;
    }

    /**
     * Display a listing of the Acudientes.
     *
     * @param Request $request
     *
     * @return Response|Factory|RedirectResponse|Redirector|View
     */
    public function index(Request $request)
    {
        $acudientes = $this->acudientesRepository->all();

        return view('acudientes.index')
            ->with('acudientes', $acudientes);
    }

    /**
     * Show the form for creating a new Acudientes.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|Response
     */
    public function create()
    {
        return view('acudientes.create');
    }

    /**
     * Store a newly created Acudientes in storage.
     *
     * @param CreateAcudientesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function store(CreateAcudientesRequest $request)
    {
        $input = $request->all();

        $acudientes = $this->acudientesRepository->create($input);

        Flash::success('Acudientes saved successfully.');

        return redirect(route('acudientes.index'));
    }

    /**
     * Display the specified Acudientes.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function show($id)
    {
        $acudientes = $this->acudientesRepository->find($id);

        if (empty($acudientes)) {
            Flash::error('Acudientes not found');

            return redirect(route('acudientes.index'));
        }

        return view('acudientes.show')->with('acudientes', $acudientes);
    }

    /**
     * Show the form for editing the specified Acudientes.
     *
     * @param int $id
     *
     * @return Factory|RedirectResponse|Redirector|View|Response
     */
    public function edit($id)
    {
        $acudientes = $this->acudientesRepository->find($id);

        if (empty($acudientes)) {
            Flash::error('Acudientes not found');

            return redirect(route('acudientes.index'));
        }

        return view('acudientes.edit')->with('acudientes', $acudientes);
    }

    /**
     * Update the specified Acudientes in storage.
     *
     * @param int $id
     * @param UpdateAcudientesRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function update($id, UpdateAcudientesRequest $request)
    {
        $acudientes = $this->acudientesRepository->find($id);

        if (empty($acudientes)) {
            Flash::error('Acudientes not found');

            return redirect(route('acudientes.index'));
        }

        $acudientes = $this->acudientesRepository->update($request->all(), $id);

        Flash::success('Acudientes updated successfully.');

        return redirect(route('acudientes.index'));
    }

    /**
     * Remove the specified Acudientes from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|Response
     */
    public function destroy($id)
    {
        $acudientes = $this->acudientesRepository->find($id);

        if (empty($acudientes)) {
            Flash::error('Acudientes not found');

            return redirect(route('acudientes.index'));
        }

        $this->acudientesRepository->delete($id);

        Flash::success('Acudientes deleted successfully.');

        return redirect(route('acudientes.index'));
    }
}
