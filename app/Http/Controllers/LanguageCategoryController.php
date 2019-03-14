<?php

namespace App\Http\Controllers;

use App\DataTables\LanguageCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateLanguageCategoryRequest;
use App\Http\Requests\UpdateLanguageCategoryRequest;
use App\Repositories\LanguageCategoryRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class LanguageCategoryController extends AppBaseController
{
    /** @var  LanguageCategoryRepository */
    private $languageCategoryRepository;

    public function __construct(LanguageCategoryRepository $languageCategoryRepo)
    {
        $this->languageCategoryRepository = $languageCategoryRepo;
    }

    /**
     * Display a listing of the LanguageCategory.
     *
     * @param LanguageCategoryDataTable $languageCategoryDataTable
     * @return Response
     */
    public function index(LanguageCategoryDataTable $languageCategoryDataTable)
    {
        return $languageCategoryDataTable->render('language_categories.index');
    }

    /**
     * Show the form for creating a new LanguageCategory.
     *
     * @return Response
     */
    public function create()
    {
        return view('language_categories.create');
    }

    /**
     * Store a newly created LanguageCategory in storage.
     *
     * @param CreateLanguageCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateLanguageCategoryRequest $request)
    {
        $input = $request->all();

        $languageCategory = $this->languageCategoryRepository->create($input);

        Flash::success('Language Category saved successfully.');

        return redirect(route('languageCategories.index'));
    }

    /**
     * Display the specified LanguageCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $languageCategory = $this->languageCategoryRepository->findWithoutFail($id);

        if (empty($languageCategory)) {
            Flash::error('Language Category not found');

            return redirect(route('languageCategories.index'));
        }

        return view('language_categories.show')->with('languageCategory', $languageCategory);
    }

    /**
     * Show the form for editing the specified LanguageCategory.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $languageCategory = $this->languageCategoryRepository->findWithoutFail($id);

        if (empty($languageCategory)) {
            Flash::error('Language Category not found');

            return redirect(route('languageCategories.index'));
        }

        return view('language_categories.edit')->with('languageCategory', $languageCategory);
    }

    /**
     * Update the specified LanguageCategory in storage.
     *
     * @param  int              $id
     * @param UpdateLanguageCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateLanguageCategoryRequest $request)
    {
        $languageCategory = $this->languageCategoryRepository->findWithoutFail($id);

        if (empty($languageCategory)) {
            Flash::error('Language Category not found');

            return redirect(route('languageCategories.index'));
        }

        $languageCategory = $this->languageCategoryRepository->update($request->all(), $id);

        Flash::success('Language Category updated successfully.');

        return redirect(route('languageCategories.index'));
    }

    /**
     * Remove the specified LanguageCategory from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $languageCategory = $this->languageCategoryRepository->findWithoutFail($id);

        if (empty($languageCategory)) {
            Flash::error('Language Category not found');

            return redirect(route('languageCategories.index'));
        }

        $this->languageCategoryRepository->delete($id);

        Flash::success('Language Category deleted successfully.');

        return redirect(route('languageCategories.index'));
    }
}
