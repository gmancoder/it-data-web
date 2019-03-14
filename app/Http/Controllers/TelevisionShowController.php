<?php

namespace App\Http\Controllers;

use App\DataTables\TelevisionShowDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTelevisionShowRequest;
use App\Http\Requests\UpdateTelevisionShowRequest;
use App\Repositories\TelevisionShowRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TelevisionShowController extends AppBaseController
{
    /** @var  TelevisionShowRepository */
    private $televisionShowRepository;

    public function __construct(TelevisionShowRepository $televisionShowRepo)
    {
        $this->televisionShowRepository = $televisionShowRepo;
    }

    /**
     * Display a listing of the TelevisionShow.
     *
     * @param TelevisionShowDataTable $televisionShowDataTable
     * @return Response
     */
    public function index(TelevisionShowDataTable $televisionShowDataTable)
    {
        return $televisionShowDataTable->render('television_shows.index');
    }

    /**
     * Show the form for creating a new TelevisionShow.
     *
     * @return Response
     */
    public function create()
    {
        return view('television_shows.create');
    }

    /**
     * Store a newly created TelevisionShow in storage.
     *
     * @param CreateTelevisionShowRequest $request
     *
     * @return Response
     */
    public function store(CreateTelevisionShowRequest $request)
    {
        $input = $request->all();

        $televisionShow = $this->televisionShowRepository->create($input);

        Flash::success('Television Show saved successfully.');

        return redirect(route('televisionShows.index'));
    }

    /**
     * Display the specified TelevisionShow.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $televisionShow = $this->televisionShowRepository->findWithoutFail($id);

        if (empty($televisionShow)) {
            Flash::error('Television Show not found');

            return redirect(route('televisionShows.index'));
        }

        return view('television_shows.show')->with('televisionShow', $televisionShow);
    }

    /**
     * Show the form for editing the specified TelevisionShow.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $televisionShow = $this->televisionShowRepository->findWithoutFail($id);

        if (empty($televisionShow)) {
            Flash::error('Television Show not found');

            return redirect(route('televisionShows.index'));
        }

        return view('television_shows.edit')->with('televisionShow', $televisionShow);
    }

    /**
     * Update the specified TelevisionShow in storage.
     *
     * @param  int              $id
     * @param UpdateTelevisionShowRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTelevisionShowRequest $request)
    {
        $televisionShow = $this->televisionShowRepository->findWithoutFail($id);

        if (empty($televisionShow)) {
            Flash::error('Television Show not found');

            return redirect(route('televisionShows.index'));
        }

        $televisionShow = $this->televisionShowRepository->update($request->all(), $id);

        Flash::success('Television Show updated successfully.');

        return redirect(route('televisionShows.index'));
    }

    /**
     * Remove the specified TelevisionShow from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $televisionShow = $this->televisionShowRepository->findWithoutFail($id);

        if (empty($televisionShow)) {
            Flash::error('Television Show not found');

            return redirect(route('televisionShows.index'));
        }

        $this->televisionShowRepository->delete($id);

        Flash::success('Television Show deleted successfully.');

        return redirect(route('televisionShows.index'));
    }
}
