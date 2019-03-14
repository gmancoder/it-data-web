<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLastRunAPIRequest;
use App\Http\Requests\API\UpdateLastRunAPIRequest;
use App\Models\LastRun;
use App\Repositories\LastRunRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LastRunController
 * @package App\Http\Controllers\API
 */

class LastRunAPIController extends AppBaseController
{
    /** @var  LastRunRepository */
    private $lastRunRepository;

    public function __construct(LastRunRepository $lastRunRepo)
    {
        $this->lastRunRepository = $lastRunRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/lastRuns",
     *      summary="Get a listing of the LastRuns.",
     *      tags={"LastRun"},
     *      description="Get all LastRuns",
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
     *                  @SWG\Items(ref="#/definitions/LastRun")
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
        $this->lastRunRepository->pushCriteria(new RequestCriteria($request));
        $this->lastRunRepository->pushCriteria(new LimitOffsetCriteria($request));
        $lastRuns = $this->lastRunRepository->all();

        return $this->sendResponse($lastRuns->toArray(), 'Last Runs retrieved successfully');
    }

    /**
     * @param CreateLastRunAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/lastRuns",
     *      summary="Store a newly created LastRun in storage",
     *      tags={"LastRun"},
     *      description="Store LastRun",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LastRun that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LastRun")
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
     *                  ref="#/definitions/LastRun"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLastRunAPIRequest $request)
    {
        $input = $request->all();

        $lastRuns = $this->lastRunRepository->create($input);

        return $this->sendResponse($lastRuns->toArray(), 'Last Run saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/lastRuns/{id}",
     *      summary="Display the specified LastRun",
     *      tags={"LastRun"},
     *      description="Get LastRun",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LastRun",
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
     *                  ref="#/definitions/LastRun"
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
        /** @var LastRun $lastRun */
        $lastRun = $this->lastRunRepository->findWithoutFail($id);

        if (empty($lastRun)) {
            return $this->sendError('Last Run not found');
        }

        return $this->sendResponse($lastRun->toArray(), 'Last Run retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLastRunAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/lastRuns/{id}",
     *      summary="Update the specified LastRun in storage",
     *      tags={"LastRun"},
     *      description="Update LastRun",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LastRun",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LastRun that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LastRun")
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
     *                  ref="#/definitions/LastRun"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLastRunAPIRequest $request)
    {
        $input = $request->all();

        /** @var LastRun $lastRun */
        $lastRun = $this->lastRunRepository->findWithoutFail($id);

        if (empty($lastRun)) {
            return $this->sendError('Last Run not found');
        }

        $lastRun = $this->lastRunRepository->update($input, $id);

        return $this->sendResponse($lastRun->toArray(), 'LastRun updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/lastRuns/{id}",
     *      summary="Remove the specified LastRun from storage",
     *      tags={"LastRun"},
     *      description="Delete LastRun",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LastRun",
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
        /** @var LastRun $lastRun */
        $lastRun = $this->lastRunRepository->findWithoutFail($id);

        if (empty($lastRun)) {
            return $this->sendError('Last Run not found');
        }

        $lastRun->delete();

        return $this->sendResponse($id, 'Last Run deleted successfully');
    }
}
