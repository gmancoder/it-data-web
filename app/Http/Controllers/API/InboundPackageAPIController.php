<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateInboundPackageAPIRequest;
use App\Http\Requests\API\UpdateInboundPackageAPIRequest;
use App\Models\InboundPackage;
use App\Repositories\InboundPackageRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class InboundPackageController
 * @package App\Http\Controllers\API
 */

class InboundPackageAPIController extends AppBaseController
{
    /** @var  InboundPackageRepository */
    private $inboundPackageRepository;

    public function __construct(InboundPackageRepository $inboundPackageRepo)
    {
        $this->inboundPackageRepository = $inboundPackageRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/inboundPackages",
     *      summary="Get a listing of the InboundPackages.",
     *      tags={"InboundPackage"},
     *      description="Get all InboundPackages",
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
     *                  @SWG\Items(ref="#/definitions/InboundPackage")
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
        $this->inboundPackageRepository->pushCriteria(new RequestCriteria($request));
        $this->inboundPackageRepository->pushCriteria(new LimitOffsetCriteria($request));
        $inboundPackages = $this->inboundPackageRepository->all();

        return $this->sendResponse($inboundPackages->toArray(), 'Inbound Packages retrieved successfully');
    }

    /**
     * @param CreateInboundPackageAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/inboundPackages",
     *      summary="Store a newly created InboundPackage in storage",
     *      tags={"InboundPackage"},
     *      description="Store InboundPackage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InboundPackage that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InboundPackage")
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
     *                  ref="#/definitions/InboundPackage"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateInboundPackageAPIRequest $request)
    {
        $input = $request->all();

        $inboundPackages = $this->inboundPackageRepository->create($input);

        return $this->sendResponse($inboundPackages->toArray(), 'Inbound Package saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/inboundPackages/{id}",
     *      summary="Display the specified InboundPackage",
     *      tags={"InboundPackage"},
     *      description="Get InboundPackage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InboundPackage",
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
     *                  ref="#/definitions/InboundPackage"
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
        /** @var InboundPackage $inboundPackage */
        $inboundPackage = $this->inboundPackageRepository->findWithoutFail($id);

        if (empty($inboundPackage)) {
            return $this->sendError('Inbound Package not found');
        }

        return $this->sendResponse($inboundPackage->toArray(), 'Inbound Package retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateInboundPackageAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/inboundPackages/{id}",
     *      summary="Update the specified InboundPackage in storage",
     *      tags={"InboundPackage"},
     *      description="Update InboundPackage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InboundPackage",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="InboundPackage that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/InboundPackage")
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
     *                  ref="#/definitions/InboundPackage"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateInboundPackageAPIRequest $request)
    {
        $input = $request->all();

        /** @var InboundPackage $inboundPackage */
        $inboundPackage = $this->inboundPackageRepository->findWithoutFail($id);

        if (empty($inboundPackage)) {
            return $this->sendError('Inbound Package not found');
        }

        $inboundPackage = $this->inboundPackageRepository->update($input, $id);

        return $this->sendResponse($inboundPackage->toArray(), 'InboundPackage updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/inboundPackages/{id}",
     *      summary="Remove the specified InboundPackage from storage",
     *      tags={"InboundPackage"},
     *      description="Delete InboundPackage",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of InboundPackage",
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
        /** @var InboundPackage $inboundPackage */
        $inboundPackage = $this->inboundPackageRepository->findWithoutFail($id);

        if (empty($inboundPackage)) {
            return $this->sendError('Inbound Package not found');
        }

        $inboundPackage->delete();

        return $this->sendResponse($id, 'Inbound Package deleted successfully');
    }
}
