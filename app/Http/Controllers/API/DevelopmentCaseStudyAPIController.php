<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDevelopmentCaseStudyAPIRequest;
use App\Http\Requests\API\UpdateDevelopmentCaseStudyAPIRequest;
use App\Models\DevelopmentCaseStudy;
use App\Repositories\DevelopmentCaseStudyRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DevelopmentCaseStudyController
 * @package App\Http\Controllers\API
 */

class DevelopmentCaseStudyAPIController extends AppBaseController
{
    /** @var  DevelopmentCaseStudyRepository */
    private $developmentCaseStudyRepository;

    public function __construct(DevelopmentCaseStudyRepository $developmentCaseStudyRepo)
    {
        $this->developmentCaseStudyRepository = $developmentCaseStudyRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/developmentCaseStudies",
     *      summary="Get a listing of the DevelopmentCaseStudies.",
     *      tags={"DevelopmentCaseStudy"},
     *      description="Get all DevelopmentCaseStudies",
     *      produces={"application/json"},
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="array",
     *                  @SWG\Items(ref="#/definitions/DevelopmentCaseStudy")
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function index(Request $request)
    {
        $this->developmentCaseStudyRepository->pushCriteria(new RequestCriteria($request));
        $this->developmentCaseStudyRepository->pushCriteria(new LimitOffsetCriteria($request));
        $developmentCaseStudies = $this->developmentCaseStudyRepository->all();

        return $this->sendResponse($developmentCaseStudies->toArray(), 'Development Case Studies retrieved successfully');
    }

    /**
     * @param CreateDevelopmentCaseStudyAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/developmentCaseStudies",
     *      summary="Store a newly created DevelopmentCaseStudy in storage",
     *      tags={"DevelopmentCaseStudy"},
     *      description="Store DevelopmentCaseStudy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DevelopmentCaseStudy that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DevelopmentCaseStudy")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/DevelopmentCaseStudy"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDevelopmentCaseStudyAPIRequest $request)
    {
        $input = $request->all();

        $developmentCaseStudies = $this->developmentCaseStudyRepository->create($input);

        return $this->sendResponse($developmentCaseStudies->toArray(), 'Development Case Study saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/developmentCaseStudies/{id}",
     *      summary="Display the specified DevelopmentCaseStudy",
     *      tags={"DevelopmentCaseStudy"},
     *      description="Get DevelopmentCaseStudy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DevelopmentCaseStudy",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/DevelopmentCaseStudy"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function show($id)
    {
        /** @var DevelopmentCaseStudy $developmentCaseStudy */
        $developmentCaseStudy = $this->developmentCaseStudyRepository->findWithoutFail($id);

        if (empty($developmentCaseStudy)) {
            return $this->sendError('Development Case Study not found');
        }

        return $this->sendResponse($developmentCaseStudy->toArray(), 'Development Case Study retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDevelopmentCaseStudyAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/developmentCaseStudies/{id}",
     *      summary="Update the specified DevelopmentCaseStudy in storage",
     *      tags={"DevelopmentCaseStudy"},
     *      description="Update DevelopmentCaseStudy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DevelopmentCaseStudy",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DevelopmentCaseStudy that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DevelopmentCaseStudy")
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  ref="#/definitions/DevelopmentCaseStudy"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDevelopmentCaseStudyAPIRequest $request)
    {
        $input = $request->all();

        /** @var DevelopmentCaseStudy $developmentCaseStudy */
        $developmentCaseStudy = $this->developmentCaseStudyRepository->findWithoutFail($id);

        if (empty($developmentCaseStudy)) {
            return $this->sendError('Development Case Study not found');
        }

        $developmentCaseStudy = $this->developmentCaseStudyRepository->update($input, $id);

        return $this->sendResponse($developmentCaseStudy->toArray(), 'DevelopmentCaseStudy updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/developmentCaseStudies/{id}",
     *      summary="Remove the specified DevelopmentCaseStudy from storage",
     *      tags={"DevelopmentCaseStudy"},
     *      description="Delete DevelopmentCaseStudy",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DevelopmentCaseStudy",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Response(
     *          response=200,
     *          description="successful operation",
     *          @SWG\Schema(
     *              type="object",
     *              @SWG\Property(
     *                  property="success",
     *                  type="boolean"
     *              ),
     *              @SWG\Property(
     *                  property="data",
     *                  type="string"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function destroy($id)
    {
        /** @var DevelopmentCaseStudy $developmentCaseStudy */
        $developmentCaseStudy = $this->developmentCaseStudyRepository->findWithoutFail($id);

        if (empty($developmentCaseStudy)) {
            return $this->sendError('Development Case Study not found');
        }

        $developmentCaseStudy->delete();

        return $this->sendResponse($id, 'Development Case Study deleted successfully');
    }
}
