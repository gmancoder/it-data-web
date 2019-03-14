<?php

namespace App\Http\Controllers;

use App\DataTables\InboundPackageDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateInboundPackageRequest;
use App\Http\Requests\UpdateInboundPackageRequest;
use App\Repositories\InboundPackageRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class InboundPackageController extends AppBaseController
{
    /** @var  InboundPackageRepository */
    private $inboundPackageRepository;

    public function __construct(InboundPackageRepository $inboundPackageRepo)
    {
        $this->inboundPackageRepository = $inboundPackageRepo;
    }

    /**
     * Display a listing of the InboundPackage.
     *
     * @param InboundPackageDataTable $inboundPackageDataTable
     * @return Response
     */
    public function index(InboundPackageDataTable $inboundPackageDataTable)
    {
        return $inboundPackageDataTable->render('inbound_packages.index');
    }

    /**
     * Show the form for creating a new InboundPackage.
     *
     * @return Response
     */
    public function create()
    {
        return view('inbound_packages.create');
    }

    /**
     * Store a newly created InboundPackage in storage.
     *
     * @param CreateInboundPackageRequest $request
     *
     * @return Response
     */
    public function store(CreateInboundPackageRequest $request)
    {
        $input = $request->all();

        $inboundPackage = $this->inboundPackageRepository->create($input);

        Flash::success('Inbound Package saved successfully.');

        return redirect(route('inboundPackages.index'));
    }

    /**
     * Display the specified InboundPackage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $inboundPackage = $this->inboundPackageRepository->findWithoutFail($id);

        if (empty($inboundPackage)) {
            Flash::error('Inbound Package not found');

            return redirect(route('inboundPackages.index'));
        }

        return view('inbound_packages.show')->with('inboundPackage', $inboundPackage);
    }

    /**
     * Show the form for editing the specified InboundPackage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $inboundPackage = $this->inboundPackageRepository->findWithoutFail($id);

        if (empty($inboundPackage)) {
            Flash::error('Inbound Package not found');

            return redirect(route('inboundPackages.index'));
        }

        return view('inbound_packages.edit')->with('inboundPackage', $inboundPackage);
    }

    /**
     * Update the specified InboundPackage in storage.
     *
     * @param  int              $id
     * @param UpdateInboundPackageRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateInboundPackageRequest $request)
    {
        $inboundPackage = $this->inboundPackageRepository->findWithoutFail($id);

        if (empty($inboundPackage)) {
            Flash::error('Inbound Package not found');

            return redirect(route('inboundPackages.index'));
        }

        $inboundPackage = $this->inboundPackageRepository->update($request->all(), $id);

        Flash::success('Inbound Package updated successfully.');

        return redirect(route('inboundPackages.index'));
    }

    /**
     * Remove the specified InboundPackage from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $inboundPackage = $this->inboundPackageRepository->findWithoutFail($id);

        if (empty($inboundPackage)) {
            Flash::error('Inbound Package not found');

            return redirect(route('inboundPackages.index'));
        }

        $this->inboundPackageRepository->delete($id);

        Flash::success('Inbound Package deleted successfully.');

        return redirect(route('inboundPackages.index'));
    }
}
