<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTelevisionShowEpisodeAPIRequest;
use App\Http\Requests\API\UpdateTelevisionShowEpisodeAPIRequest;
use App\Models\TelevisionShowEpisode;
use App\Repositories\TelevisionShowEpisodeRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TelevisionShowEpisodeController
 * @package App\Http\Controllers\API
 */

class TelevisionShowEpisodeAPIController extends AppBaseController
{
    /** @var  TelevisionShowEpisodeRepository */
    private $televisionShowEpisodeRepository;

    public function __construct(TelevisionShowEpisodeRepository $televisionShowEpisodeRepo)
    {
        $this->televisionShowEpisodeRepository = $televisionShowEpisodeRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/televisionShowEpisodes",
     *      summary="Get a listing of the TelevisionShowEpisodes.",
     *      tags={"TelevisionShowEpisode"},
     *      description="Get all TelevisionShowEpisodes",
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
     *                  @SWG\Items(ref="#/definitions/TelevisionShowEpisode")
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
        $this->televisionShowEpisodeRepository->pushCriteria(new RequestCriteria($request));
        $this->televisionShowEpisodeRepository->pushCriteria(new LimitOffsetCriteria($request));
        $televisionShowEpisodes = $this->televisionShowEpisodeRepository->all();

        return $this->sendResponse($televisionShowEpisodes->toArray(), 'Television Show Episodes retrieved successfully');
    }

    /**
     * @param CreateTelevisionShowEpisodeAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/televisionShowEpisodes",
     *      summary="Store a newly created TelevisionShowEpisode in storage",
     *      tags={"TelevisionShowEpisode"},
     *      description="Store TelevisionShowEpisode",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TelevisionShowEpisode that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TelevisionShowEpisode")
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
     *                  ref="#/definitions/TelevisionShowEpisode"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTelevisionShowEpisodeAPIRequest $request)
    {
        $input = $request->all();

        $televisionShowEpisodes = $this->televisionShowEpisodeRepository->create($input);

        return $this->sendResponse($televisionShowEpisodes->toArray(), 'Television Show Episode saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/televisionShowEpisodes/{id}",
     *      summary="Display the specified TelevisionShowEpisode",
     *      tags={"TelevisionShowEpisode"},
     *      description="Get TelevisionShowEpisode",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TelevisionShowEpisode",
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
     *                  ref="#/definitions/TelevisionShowEpisode"
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
        /** @var TelevisionShowEpisode $televisionShowEpisode */
        $televisionShowEpisode = $this->televisionShowEpisodeRepository->findWithoutFail($id);

        if (empty($televisionShowEpisode)) {
            return $this->sendError('Television Show Episode not found');
        }

        return $this->sendResponse($televisionShowEpisode->toArray(), 'Television Show Episode retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTelevisionShowEpisodeAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/televisionShowEpisodes/{id}",
     *      summary="Update the specified TelevisionShowEpisode in storage",
     *      tags={"TelevisionShowEpisode"},
     *      description="Update TelevisionShowEpisode",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TelevisionShowEpisode",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TelevisionShowEpisode that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TelevisionShowEpisode")
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
     *                  ref="#/definitions/TelevisionShowEpisode"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTelevisionShowEpisodeAPIRequest $request)
    {
        $input = $request->all();

        /** @var TelevisionShowEpisode $televisionShowEpisode */
        $televisionShowEpisode = $this->televisionShowEpisodeRepository->findWithoutFail($id);

        if (empty($televisionShowEpisode)) {
            return $this->sendError('Television Show Episode not found');
        }

        $televisionShowEpisode = $this->televisionShowEpisodeRepository->update($input, $id);

        return $this->sendResponse($televisionShowEpisode->toArray(), 'TelevisionShowEpisode updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/televisionShowEpisodes/{id}",
     *      summary="Remove the specified TelevisionShowEpisode from storage",
     *      tags={"TelevisionShowEpisode"},
     *      description="Delete TelevisionShowEpisode",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TelevisionShowEpisode",
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
        /** @var TelevisionShowEpisode $televisionShowEpisode */
        $televisionShowEpisode = $this->televisionShowEpisodeRepository->findWithoutFail($id);

        if (empty($televisionShowEpisode)) {
            return $this->sendError('Television Show Episode not found');
        }

        $televisionShowEpisode->delete();

        return $this->sendResponse($id, 'Television Show Episode deleted successfully');
    }
}
