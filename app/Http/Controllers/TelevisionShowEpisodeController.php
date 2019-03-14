<?php

namespace App\Http\Controllers;

use App\DataTables\TelevisionShowEpisodeDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateTelevisionShowEpisodeRequest;
use App\Http\Requests\UpdateTelevisionShowEpisodeRequest;
use App\Repositories\TelevisionShowEpisodeRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class TelevisionShowEpisodeController extends AppBaseController
{
    /** @var  TelevisionShowEpisodeRepository */
    private $televisionShowEpisodeRepository;

    public function __construct(TelevisionShowEpisodeRepository $televisionShowEpisodeRepo)
    {
        $this->televisionShowEpisodeRepository = $televisionShowEpisodeRepo;
    }

    /**
     * Display a listing of the TelevisionShowEpisode.
     *
     * @param TelevisionShowEpisodeDataTable $televisionShowEpisodeDataTable
     * @return Response
     */
    public function index(TelevisionShowEpisodeDataTable $televisionShowEpisodeDataTable)
    {
        return $televisionShowEpisodeDataTable->render('television_show_episodes.index');
    }

    /**
     * Show the form for creating a new TelevisionShowEpisode.
     *
     * @return Response
     */
    public function create()
    {
        return view('television_show_episodes.create');
    }

    /**
     * Store a newly created TelevisionShowEpisode in storage.
     *
     * @param CreateTelevisionShowEpisodeRequest $request
     *
     * @return Response
     */
    public function store(CreateTelevisionShowEpisodeRequest $request)
    {
        $input = $request->all();

        $televisionShowEpisode = $this->televisionShowEpisodeRepository->create($input);

        Flash::success('Television Show Episode saved successfully.');

        return redirect(route('televisionShowEpisodes.index'));
    }

    /**
     * Display the specified TelevisionShowEpisode.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $televisionShowEpisode = $this->televisionShowEpisodeRepository->findWithoutFail($id);

        if (empty($televisionShowEpisode)) {
            Flash::error('Television Show Episode not found');

            return redirect(route('televisionShowEpisodes.index'));
        }

        return view('television_show_episodes.show')->with('televisionShowEpisode', $televisionShowEpisode);
    }

    /**
     * Show the form for editing the specified TelevisionShowEpisode.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $televisionShowEpisode = $this->televisionShowEpisodeRepository->findWithoutFail($id);

        if (empty($televisionShowEpisode)) {
            Flash::error('Television Show Episode not found');

            return redirect(route('televisionShowEpisodes.index'));
        }

        return view('television_show_episodes.edit')->with('televisionShowEpisode', $televisionShowEpisode);
    }

    /**
     * Update the specified TelevisionShowEpisode in storage.
     *
     * @param  int              $id
     * @param UpdateTelevisionShowEpisodeRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTelevisionShowEpisodeRequest $request)
    {
        $televisionShowEpisode = $this->televisionShowEpisodeRepository->findWithoutFail($id);

        if (empty($televisionShowEpisode)) {
            Flash::error('Television Show Episode not found');

            return redirect(route('televisionShowEpisodes.index'));
        }

        $televisionShowEpisode = $this->televisionShowEpisodeRepository->update($request->all(), $id);

        Flash::success('Television Show Episode updated successfully.');

        return redirect(route('televisionShowEpisodes.index'));
    }

    /**
     * Remove the specified TelevisionShowEpisode from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $televisionShowEpisode = $this->televisionShowEpisodeRepository->findWithoutFail($id);

        if (empty($televisionShowEpisode)) {
            Flash::error('Television Show Episode not found');

            return redirect(route('televisionShowEpisodes.index'));
        }

        $this->televisionShowEpisodeRepository->delete($id);

        Flash::success('Television Show Episode deleted successfully.');

        return redirect(route('televisionShowEpisodes.index'));
    }
}
