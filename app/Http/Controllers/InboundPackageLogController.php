<?php

namespace App\Http\Controllers;

use App\DataTables\InboundPackageLogDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInboundPackageLogRequest;
use App\Http\Requests\UpdateInboundPackageLogRequest;
use App\Repositories\InboundPackageLogRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InboundPackageLogController extends AppBaseController
{
    /** @var  InboundPackageLogRepository */
    private $inboundPackageLogRepository;

    public function __construct(InboundPackageLogRepository $inboundPackageLogRepo)
    {
        $this->inboundPackageLogRepository = $inboundPackageLogRepo;
    }

    /**
     * Display a listing of the InboundPackageLog.
     *
     * @param InboundPackageLogDataTable $inboundPackageLogDataTable
     * @return Response
     */
    public function index(InboundPackageLogDataTable $inboundPackageLogDataTable)
    {
        return $inboundPackageLogDataTable->render('inbound_package_logs.index');
    }

    /**
     * Show the form for creating a new InboundPackageLog.
     *
     * @return Response
     */
    public function create()
    {
        return view('inbound_package_logs.create');
    }

    /**
     * Store a newly created InboundPackageLog in storage.
     *
     * @param CreateInboundPackageLogRequest $request
     *
     * @return Response
     */
    public function store(CreateInboundPackageLogRequest $request)
    {
        $input = $request->all();

        $inboundPackageLog = $this->inboundPackageLogRepository->create($input);

        Flash::success('Inbound Package Log saved successfully.');

        return redirect(route('inboundPackageLogs.index'));
    }

    /**
     * Display the specified InboundPackageLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inboundPackageLog = $this->inboundPackageLogRepository->findWithoutFail($id);

        if (empty($inboundPackageLog)) {
            Flash::error('Inbound Package Log not found');

            return redirect(route('inboundPackageLogs.index'));
        }

        return view('inbound_package_logs.show')->with('inboundPackageLog', $inboundPackageLog);
    }

    /**
     * Show the form for editing the specified InboundPackageLog.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inboundPackageLog = $this->inboundPackageLogRepository->findWithoutFail($id);

        if (empty($inboundPackageLog)) {
            Flash::error('Inbound Package Log not found');

            return redirect(route('inboundPackageLogs.index'));
        }

        return view('inbound_package_logs.edit')->with('inboundPackageLog', $inboundPackageLog);
    }

    /**
     * Update the specified InboundPackageLog in storage.
     *
     * @param  int              $id
     * @param UpdateInboundPackageLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInboundPackageLogRequest $request)
    {
        $inboundPackageLog = $this->inboundPackageLogRepository->findWithoutFail($id);

        if (empty($inboundPackageLog)) {
            Flash::error('Inbound Package Log not found');

            return redirect(route('inboundPackageLogs.index'));
        }

        $inboundPackageLog = $this->inboundPackageLogRepository->update($request->all(), $id);

        Flash::success('Inbound Package Log updated successfully.');

        return redirect(route('inboundPackageLogs.index'));
    }

    /**
     * Remove the specified InboundPackageLog from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inboundPackageLog = $this->inboundPackageLogRepository->findWithoutFail($id);

        if (empty($inboundPackageLog)) {
            Flash::error('Inbound Package Log not found');

            return redirect(route('inboundPackageLogs.index'));
        }

        $this->inboundPackageLogRepository->delete($id);

        Flash::success('Inbound Package Log deleted successfully.');

        return redirect(route('inboundPackageLogs.index'));
    }
}
