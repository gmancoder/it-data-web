<?php

namespace App\Http\Controllers;

use App\DataTables\WebsiteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateWebsiteRequest;
use App\Http\Requests\UpdateWebsiteRequest;
use App\Repositories\WebsiteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WebsiteController extends AppBaseController
{
    /** @var  WebsiteRepository */
    private $websiteRepository;

    public function __construct(WebsiteRepository $websiteRepo)
    {
        $this->websiteRepository = $websiteRepo;
    }

    /**
     * Display a listing of the Website.
     *
     * @param WebsiteDataTable $websiteDataTable
     * @return Response
     */
    public function index(WebsiteDataTable $websiteDataTable)
    {
        return $websiteDataTable->render('websites.index');
    }

    /**
     * Show the form for creating a new Website.
     *
     * @return Response
     */
    public function create()
    {
        return view('websites.create');
    }

    /**
     * Store a newly created Website in storage.
     *
     * @param CreateWebsiteRequest $request
     *
     * @return Response
     */
    public function store(CreateWebsiteRequest $request)
    {
        $input = $request->all();

        $website = $this->websiteRepository->create($input);

        Flash::success('Website saved successfully.');

        return redirect(route('websites.index'));
    }

    /**
     * Display the specified Website.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $website = $this->websiteRepository->findWithoutFail($id);

        if (empty($website)) {
            Flash::error('Website not found');

            return redirect(route('websites.index'));
        }

        return view('websites.show')->with('website', $website);
    }

    /**
     * Show the form for editing the specified Website.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $website = $this->websiteRepository->findWithoutFail($id);

        if (empty($website)) {
            Flash::error('Website not found');

            return redirect(route('websites.index'));
        }

        return view('websites.edit')->with('website', $website);
    }

    /**
     * Update the specified Website in storage.
     *
     * @param  int              $id
     * @param UpdateWebsiteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWebsiteRequest $request)
    {
        $website = $this->websiteRepository->findWithoutFail($id);

        if (empty($website)) {
            Flash::error('Website not found');

            return redirect(route('websites.index'));
        }

        $website = $this->websiteRepository->update($request->all(), $id);

        Flash::success('Website updated successfully.');

        return redirect(route('websites.index'));
    }

    /**
     * Remove the specified Website from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $website = $this->websiteRepository->findWithoutFail($id);

        if (empty($website)) {
            Flash::error('Website not found');

            return redirect(route('websites.index'));
        }

        $this->websiteRepository->delete($id);

        Flash::success('Website deleted successfully.');

        return redirect(route('websites.index'));
    }
}
