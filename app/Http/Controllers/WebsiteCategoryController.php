<?php

namespace App\Http\Controllers;

use App\DataTables\WebsiteCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateWebsiteCategoryRequest;
use App\Http\Requests\UpdateWebsiteCategoryRequest;
use App\Repositories\WebsiteCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class WebsiteCategoryController extends AppBaseController
{
    /** @var  WebsiteCategoryRepository */
    private $websiteCategoryRepository;

    public function __construct(WebsiteCategoryRepository $websiteCategoryRepo)
    {
        $this->websiteCategoryRepository = $websiteCategoryRepo;
    }

    /**
     * Display a listing of the WebsiteCategory.
     *
     * @param WebsiteCategoryDataTable $websiteCategoryDataTable
     * @return Response
     */
    public function index(WebsiteCategoryDataTable $websiteCategoryDataTable)
    {
        return $websiteCategoryDataTable->render('website_categories.index');
    }

    /**
     * Show the form for creating a new WebsiteCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('website_categories.create');
    }

    /**
     * Store a newly created WebsiteCategory in storage.
     *
     * @param CreateWebsiteCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateWebsiteCategoryRequest $request)
    {
        $input = $request->all();

        $websiteCategory = $this->websiteCategoryRepository->create($input);

        Flash::success('Website Category saved successfully.');

        return redirect(route('websiteCategories.index'));
    }

    /**
     * Display the specified WebsiteCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $websiteCategory = $this->websiteCategoryRepository->findWithoutFail($id);

        if (empty($websiteCategory)) {
            Flash::error('Website Category not found');

            return redirect(route('websiteCategories.index'));
        }

        return view('website_categories.show')->with('websiteCategory', $websiteCategory);
    }

    /**
     * Show the form for editing the specified WebsiteCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $websiteCategory = $this->websiteCategoryRepository->findWithoutFail($id);

        if (empty($websiteCategory)) {
            Flash::error('Website Category not found');

            return redirect(route('websiteCategories.index'));
        }

        return view('website_categories.edit')->with('websiteCategory', $websiteCategory);
    }

    /**
     * Update the specified WebsiteCategory in storage.
     *
     * @param  int              $id
     * @param UpdateWebsiteCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWebsiteCategoryRequest $request)
    {
        $websiteCategory = $this->websiteCategoryRepository->findWithoutFail($id);

        if (empty($websiteCategory)) {
            Flash::error('Website Category not found');

            return redirect(route('websiteCategories.index'));
        }

        $websiteCategory = $this->websiteCategoryRepository->update($request->all(), $id);

        Flash::success('Website Category updated successfully.');

        return redirect(route('websiteCategories.index'));
    }

    /**
     * Remove the specified WebsiteCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $websiteCategory = $this->websiteCategoryRepository->findWithoutFail($id);

        if (empty($websiteCategory)) {
            Flash::error('Website Category not found');

            return redirect(route('websiteCategories.index'));
        }

        $this->websiteCategoryRepository->delete($id);

        Flash::success('Website Category deleted successfully.');

        return redirect(route('websiteCategories.index'));
    }
}
