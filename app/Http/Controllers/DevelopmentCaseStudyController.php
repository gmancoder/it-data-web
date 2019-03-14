<?php

namespace App\Http\Controllers;

use App\DataTables\DevelopmentCaseStudyDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDevelopmentCaseStudyRequest;
use App\Http\Requests\UpdateDevelopmentCaseStudyRequest;
use App\Repositories\DevelopmentCaseStudyRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DevelopmentCaseStudyController extends AppBaseController
{
    /** @var  DevelopmentCaseStudyRepository */
    private $developmentCaseStudyRepository;

    public function __construct(DevelopmentCaseStudyRepository $developmentCaseStudyRepo)
    {
        $this->developmentCaseStudyRepository = $developmentCaseStudyRepo;
    }

    /**
     * Display a listing of the DevelopmentCaseStudy.
     *
     * @param DevelopmentCaseStudyDataTable $developmentCaseStudyDataTable
     * @return Response
     */
    public function index(DevelopmentCaseStudyDataTable $developmentCaseStudyDataTable)
    {
        return $developmentCaseStudyDataTable->render('development_case_studies.index');
    }

    /**
     * Show the form for creating a new DevelopmentCaseStudy.
     *
     * @return Response
     */
    public function create()
    {
        return view('development_case_studies.create');
    }

    /**
     * Store a newly created DevelopmentCaseStudy in storage.
     *
     * @param CreateDevelopmentCaseStudyRequest $request
     *
     * @return Response
     */
    public function store(CreateDevelopmentCaseStudyRequest $request)
    {
        $input = $request->all();

        $developmentCaseStudy = $this->developmentCaseStudyRepository->create($input);

        Flash::success('Development Case Study saved successfully.');

        return redirect(route('developmentCaseStudies.index'));
    }

    /**
     * Display the specified DevelopmentCaseStudy.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $developmentCaseStudy = $this->developmentCaseStudyRepository->findWithoutFail($id);

        if (empty($developmentCaseStudy)) {
            Flash::error('Development Case Study not found');

            return redirect(route('developmentCaseStudies.index'));
        }

        return view('development_case_studies.show')->with('developmentCaseStudy', $developmentCaseStudy);
    }

    /**
     * Show the form for editing the specified DevelopmentCaseStudy.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $developmentCaseStudy = $this->developmentCaseStudyRepository->findWithoutFail($id);

        if (empty($developmentCaseStudy)) {
            Flash::error('Development Case Study not found');

            return redirect(route('developmentCaseStudies.index'));
        }

        return view('development_case_studies.edit')->with('developmentCaseStudy', $developmentCaseStudy);
    }

    /**
     * Update the specified DevelopmentCaseStudy in storage.
     *
     * @param  int              $id
     * @param UpdateDevelopmentCaseStudyRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDevelopmentCaseStudyRequest $request)
    {
        $developmentCaseStudy = $this->developmentCaseStudyRepository->findWithoutFail($id);

        if (empty($developmentCaseStudy)) {
            Flash::error('Development Case Study not found');

            return redirect(route('developmentCaseStudies.index'));
        }

        $developmentCaseStudy = $this->developmentCaseStudyRepository->update($request->all(), $id);

        Flash::success('Development Case Study updated successfully.');

        return redirect(route('developmentCaseStudies.index'));
    }

    /**
     * Remove the specified DevelopmentCaseStudy from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $developmentCaseStudy = $this->developmentCaseStudyRepository->findWithoutFail($id);

        if (empty($developmentCaseStudy)) {
            Flash::error('Development Case Study not found');

            return redirect(route('developmentCaseStudies.index'));
        }

        $this->developmentCaseStudyRepository->delete($id);

        Flash::success('Development Case Study deleted successfully.');

        return redirect(route('developmentCaseStudies.index'));
    }
}
