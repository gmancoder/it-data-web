<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDownloadItemAPIRequest;
use App\Http\Requests\API\UpdateDownloadItemAPIRequest;
use App\Models\DownloadItem;
use App\Repositories\DownloadItemRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class DownloadItemController
 * @package App\Http\Controllers\API
 */

class DownloadItemAPIController extends AppBaseController
{
    /** @var  DownloadItemRepository */
    private $downloadItemRepository;

    public function __construct(DownloadItemRepository $downloadItemRepo)
    {
        $this->downloadItemRepository = $downloadItemRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/downloadItems",
     *      summary="Get a listing of the DownloadItems.",
     *      tags={"DownloadItem"},
     *      description="Get all DownloadItems",
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
     *                  @SWG\Items(ref="#/definitions/DownloadItem")
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
        $this->downloadItemRepository->pushCriteria(new RequestCriteria($request));
        $this->downloadItemRepository->pushCriteria(new LimitOffsetCriteria($request));
        $downloadItems = $this->downloadItemRepository->all();

        return $this->sendResponse($downloadItems->toArray(), 'Download Items retrieved successfully');
    }

    /**
     * @param CreateDownloadItemAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/downloadItems",
     *      summary="Store a newly created DownloadItem in storage",
     *      tags={"DownloadItem"},
     *      description="Store DownloadItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DownloadItem that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DownloadItem")
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
     *                  ref="#/definitions/DownloadItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateDownloadItemAPIRequest $request)
    {
        $input = $request->all();

        $downloadItems = $this->downloadItemRepository->create($input);

        return $this->sendResponse($downloadItems->toArray(), 'Download Item saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/downloadItems/{id}",
     *      summary="Display the specified DownloadItem",
     *      tags={"DownloadItem"},
     *      description="Get DownloadItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DownloadItem",
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
     *                  ref="#/definitions/DownloadItem"
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
        /** @var DownloadItem $downloadItem */
        $downloadItem = $this->downloadItemRepository->findWithoutFail($id);

        if (empty($downloadItem)) {
            return $this->sendError('Download Item not found');
        }

        return $this->sendResponse($downloadItem->toArray(), 'Download Item retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateDownloadItemAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/downloadItems/{id}",
     *      summary="Update the specified DownloadItem in storage",
     *      tags={"DownloadItem"},
     *      description="Update DownloadItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DownloadItem",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="DownloadItem that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/DownloadItem")
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
     *                  ref="#/definitions/DownloadItem"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateDownloadItemAPIRequest $request)
    {
        $input = $request->all();

        /** @var DownloadItem $downloadItem */
        $downloadItem = $this->downloadItemRepository->findWithoutFail($id);

        if (empty($downloadItem)) {
            return $this->sendError('Download Item not found');
        }

        $downloadItem = $this->downloadItemRepository->update($input, $id);

        return $this->sendResponse($downloadItem->toArray(), 'DownloadItem updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/downloadItems/{id}",
     *      summary="Remove the specified DownloadItem from storage",
     *      tags={"DownloadItem"},
     *      description="Delete DownloadItem",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of DownloadItem",
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
        /** @var DownloadItem $downloadItem */
        $downloadItem = $this->downloadItemRepository->findWithoutFail($id);

        if (empty($downloadItem)) {
            return $this->sendError('Download Item not found');
        }

        $downloadItem->delete();

        return $this->sendResponse($id, 'Download Item deleted successfully');
    }
}
