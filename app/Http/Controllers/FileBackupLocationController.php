<?php

namespace App\Http\Controllers;

use App\DataTables\FileBackupLocationDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateFileBackupLocationRequest;
use App\Http\Requests\UpdateFileBackupLocationRequest;
use App\Repositories\FileBackupLocationRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class FileBackupLocationController extends AppBaseController
{
    /** @var  FileBackupLocationRepository */
    private $fileBackupLocationRepository;

    public function __construct(FileBackupLocationRepository $fileBackupLocationRepo)
    {
        $this->fileBackupLocationRepository = $fileBackupLocationRepo;
    }

    /**
     * Display a listing of the FileBackupLocation.
     *
     * @param FileBackupLocationDataTable $fileBackupLocationDataTable
     * @return Response
     */
    public function index(FileBackupLocationDataTable $fileBackupLocationDataTable)
    {
        return $fileBackupLocationDataTable->render('file_backup_locations.index');
    }

    /**
     * Show the form for creating a new FileBackupLocation.
     *
     * @return Response
     */
    public function create()
    {
        return view('file_backup_locations.create');
    }

    /**
     * Store a newly created FileBackupLocation in storage.
     *
     * @param CreateFileBackupLocationRequest $request
     *
     * @return Response
     */
    public function store(CreateFileBackupLocationRequest $request)
    {
        $input = $request->all();

        $fileBackupLocation = $this->fileBackupLocationRepository->create($input);

        Flash::success('File Backup Location saved successfully.');

        return redirect(route('fileBackupLocations.index'));
    }

    /**
     * Display the specified FileBackupLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $fileBackupLocation = $this->fileBackupLocationRepository->findWithoutFail($id);

        if (empty($fileBackupLocation)) {
            Flash::error('File Backup Location not found');

            return redirect(route('fileBackupLocations.index'));
        }

        return view('file_backup_locations.show')->with('fileBackupLocation', $fileBackupLocation);
    }

    /**
     * Show the form for editing the specified FileBackupLocation.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $fileBackupLocation = $this->fileBackupLocationRepository->findWithoutFail($id);

        if (empty($fileBackupLocation)) {
            Flash::error('File Backup Location not found');

            return redirect(route('fileBackupLocations.index'));
        }

        return view('file_backup_locations.edit')->with('fileBackupLocation', $fileBackupLocation);
    }

    /**
     * Update the specified FileBackupLocation in storage.
     *
     * @param  int              $id
     * @param UpdateFileBackupLocationRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateFileBackupLocationRequest $request)
    {
        $fileBackupLocation = $this->fileBackupLocationRepository->findWithoutFail($id);

        if (empty($fileBackupLocation)) {
            Flash::error('File Backup Location not found');

            return redirect(route('fileBackupLocations.index'));
        }

        $fileBackupLocation = $this->fileBackupLocationRepository->update($request->all(), $id);

        Flash::success('File Backup Location updated successfully.');

        return redirect(route('fileBackupLocations.index'));
    }

    /**
     * Remove the specified FileBackupLocation from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $fileBackupLocation = $this->fileBackupLocationRepository->findWithoutFail($id);

        if (empty($fileBackupLocation)) {
            Flash::error('File Backup Location not found');

            return redirect(route('fileBackupLocations.index'));
        }

        $this->fileBackupLocationRepository->delete($id);

        Flash::success('File Backup Location deleted successfully.');

        return redirect(route('fileBackupLocations.index'));
    }
}
