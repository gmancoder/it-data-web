<?php

namespace App\Http\Controllers;

use App\DataTables\LastRunDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLastRunRequest;
use App\Http\Requests\UpdateLastRunRequest;
use App\Repositories\LastRunRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LastRunController extends AppBaseController
{
    /** @var  LastRunRepository */
    private $lastRunRepository;

    public function __construct(LastRunRepository $lastRunRepo)
    {
        $this->lastRunRepository = $lastRunRepo;
    }

    /**
     * Display a listing of the LastRun.
     *
     * @param LastRunDataTable $lastRunDataTable
     * @return Response
     */
    public function index(LastRunDataTable $lastRunDataTable)
    {
        return $lastRunDataTable->render('last_runs.index');
    }

    /**
     * Show the form for creating a new LastRun.
     *
     * @return Response
     */
    public function create()
    {
        return view('last_runs.create');
    }

    /**
     * Store a newly created LastRun in storage.
     *
     * @param CreateLastRunRequest $request
     *
     * @return Response
     */
    public function store(CreateLastRunRequest $request)
    {
        $input = $request->all();

        $lastRun = $this->lastRunRepository->create($input);

        Flash::success('Last Run saved successfully.');

        return redirect(route('lastRuns.index'));
    }

    /**
     * Display the specified LastRun.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $lastRun = $this->lastRunRepository->findWithoutFail($id);

        if (empty($lastRun)) {
            Flash::error('Last Run not found');

            return redirect(route('lastRuns.index'));
        }

        return view('last_runs.show')->with('lastRun', $lastRun);
    }

    /**
     * Show the form for editing the specified LastRun.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $lastRun = $this->lastRunRepository->findWithoutFail($id);

        if (empty($lastRun)) {
            Flash::error('Last Run not found');

            return redirect(route('lastRuns.index'));
        }

        return view('last_runs.edit')->with('lastRun', $lastRun);
    }

    /**
     * Update the specified LastRun in storage.
     *
     * @param  int              $id
     * @param UpdateLastRunRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLastRunRequest $request)
    {
        $lastRun = $this->lastRunRepository->findWithoutFail($id);

        if (empty($lastRun)) {
            Flash::error('Last Run not found');

            return redirect(route('lastRuns.index'));
        }

        $lastRun = $this->lastRunRepository->update($request->all(), $id);

        Flash::success('Last Run updated successfully.');

        return redirect(route('lastRuns.index'));
    }

    /**
     * Remove the specified LastRun from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $lastRun = $this->lastRunRepository->findWithoutFail($id);

        if (empty($lastRun)) {
            Flash::error('Last Run not found');

            return redirect(route('lastRuns.index'));
        }

        $this->lastRunRepository->delete($id);

        Flash::success('Last Run deleted successfully.');

        return redirect(route('lastRuns.index'));
    }
}
