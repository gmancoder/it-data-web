<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInboundPackageLogAPIRequest;
use App\Http\Requests\API\UpdateInboundPackageLogAPIRequest;
use App\Models\InboundPackageLog;
use App\Repositories\InboundPackageLogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InboundPackageLogController
 * @package App\Http\Controllers\API
 */

class InboundPackageLogAPIController extends AppBaseController
{
    /** @var  InboundPackageLogRepository */
    private $inboundPackageLogRepository;

    public function __construct(InboundPackageLogRepository $inboundPackageLogRepo)
    {
        $this->inboundPackageLogRepository = $inboundPackageLogRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/inboundPackageLogs",
     *      summary="Get a listing of the InboundPackageLogs.",
     *      tags={"InboundPackageLog"},
     *      description="Get all InboundPackageLogs",
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
     *                  @SWG\Items(ref="#/definitions/InboundPackageLog")
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
        $this->inboundPackageLogRepository->pushCriteria(new RequestCriteria($request));
        $this->inboundPackageLogRepository->pushCriteria(new LimitOffsetCriteria($request));
        $inboundPackageLogs = $this->inboundPackageLogRepository->all();

        return $this->sendResponse($inboundPackageLogs->toArray(), 'Inbound Package Logs retrieved successfully');
    }

    /**
     * @param CreateInboundPackageLogAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/inboundPackageLogs",
     *      summary="Store a newly created InboundPackageLog in storage",
     *      tags={"InboundPackageLog"},
     *      description="Store InboundPackageLog",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InboundPackageLog that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InboundPackageLog")
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
     *                  ref="#/definitions/InboundPackageLog"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInboundPackageLogAPIRequest $request)
    {
        $input = $request->all();

        $inboundPackageLogs = $this->inboundPackageLogRepository->create($input);

        return $this->sendResponse($inboundPackageLogs->toArray(), 'Inbound Package Log saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/inboundPackageLogs/{id}",
     *      summary="Display the specified InboundPackageLog",
     *      tags={"InboundPackageLog"},
     *      description="Get InboundPackageLog",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InboundPackageLog",
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
     *                  ref="#/definitions/InboundPackageLog"
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
        /** @var InboundPackageLog $inboundPackageLog */
        $inboundPackageLog = $this->inboundPackageLogRepository->findWithoutFail($id);

        if (empty($inboundPackageLog)) {
            return $this->sendError('Inbound Package Log not found');
        }

        return $this->sendResponse($inboundPackageLog->toArray(), 'Inbound Package Log retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInboundPackageLogAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/inboundPackageLogs/{id}",
     *      summary="Update the specified InboundPackageLog in storage",
     *      tags={"InboundPackageLog"},
     *      description="Update InboundPackageLog",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InboundPackageLog",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InboundPackageLog that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InboundPackageLog")
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
     *                  ref="#/definitions/InboundPackageLog"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInboundPackageLogAPIRequest $request)
    {
        $input = $request->all();

        /** @var InboundPackageLog $inboundPackageLog */
        $inboundPackageLog = $this->inboundPackageLogRepository->findWithoutFail($id);

        if (empty($inboundPackageLog)) {
            return $this->sendError('Inbound Package Log not found');
        }

        $inboundPackageLog = $this->inboundPackageLogRepository->update($input, $id);

        return $this->sendResponse($inboundPackageLog->toArray(), 'InboundPackageLog updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/inboundPackageLogs/{id}",
     *      summary="Remove the specified InboundPackageLog from storage",
     *      tags={"InboundPackageLog"},
     *      description="Delete InboundPackageLog",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InboundPackageLog",
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
        /** @var InboundPackageLog $inboundPackageLog */
        $inboundPackageLog = $this->inboundPackageLogRepository->findWithoutFail($id);

        if (empty($inboundPackageLog)) {
            return $this->sendError('Inbound Package Log not found');
        }

        $inboundPackageLog->delete();

        return $this->sendResponse($id, 'Inbound Package Log deleted successfully');
    }
}
