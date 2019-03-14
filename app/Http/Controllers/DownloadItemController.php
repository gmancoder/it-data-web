<?php

namespace App\Http\Controllers;

use App\DataTables\DownloadItemDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDownloadItemRequest;
use App\Http\Requests\UpdateDownloadItemRequest;
use App\Repositories\DownloadItemRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DownloadItemController extends AppBaseController
{
    /** @var  DownloadItemRepository */
    private $downloadItemRepository;

    public function __construct(DownloadItemRepository $downloadItemRepo)
    {
        $this->downloadItemRepository = $downloadItemRepo;
    }

    /**
     * Display a listing of the DownloadItem.
     *
     * @param DownloadItemDataTable $downloadItemDataTable
     * @return Response
     */
    public function index(DownloadItemDataTable $downloadItemDataTable)
    {
        return $downloadItemDataTable->render('download_items.index');
    }

    /**
     * Show the form for creating a new DownloadItem.
     *
     * @return Response
     */
    public function create()
    {
        return view('download_items.create');
    }

    /**
     * Store a newly created DownloadItem in storage.
     *
     * @param CreateDownloadItemRequest $request
     *
     * @return Response
     */
    public function store(CreateDownloadItemRequest $request)
    {
        $input = $request->all();

        $downloadItem = $this->downloadItemRepository->create($input);

        Flash::success('Download Item saved successfully.');

        return redirect(route('downloadItems.index'));
    }

    /**
     * Display the specified DownloadItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $downloadItem = $this->downloadItemRepository->findWithoutFail($id);

        if (empty($downloadItem)) {
            Flash::error('Download Item not found');

            return redirect(route('downloadItems.index'));
        }

        return view('download_items.show')->with('downloadItem', $downloadItem);
    }

    /**
     * Show the form for editing the specified DownloadItem.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $downloadItem = $this->downloadItemRepository->findWithoutFail($id);

        if (empty($downloadItem)) {
            Flash::error('Download Item not found');

            return redirect(route('downloadItems.index'));
        }

        return view('download_items.edit')->with('downloadItem', $downloadItem);
    }

    /**
     * Update the specified DownloadItem in storage.
     *
     * @param  int              $id
     * @param UpdateDownloadItemRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDownloadItemRequest $request)
    {
        $downloadItem = $this->downloadItemRepository->findWithoutFail($id);

        if (empty($downloadItem)) {
            Flash::error('Download Item not found');

            return redirect(route('downloadItems.index'));
        }

        $downloadItem = $this->downloadItemRepository->update($request->all(), $id);

        Flash::success('Download Item updated successfully.');

        return redirect(route('downloadItems.index'));
    }

    /**
     * Remove the specified DownloadItem from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $downloadItem = $this->downloadItemRepository->findWithoutFail($id);

        if (empty($downloadItem)) {
            Flash::error('Download Item not found');

            return redirect(route('downloadItems.index'));
        }

        $this->downloadItemRepository->delete($id);

        Flash::success('Download Item deleted successfully.');

        return redirect(route('downloadItems.index'));
    }
}
