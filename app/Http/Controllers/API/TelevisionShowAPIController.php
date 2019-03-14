<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTelevisionShowAPIRequest;
use App\Http\Requests\API\UpdateTelevisionShowAPIRequest;
use App\Models\TelevisionShow;
use App\Repositories\TelevisionShowRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TelevisionShowController
 * @package App\Http\Controllers\API
 */

class TelevisionShowAPIController extends AppBaseController
{
    /** @var  TelevisionShowRepository */
    private $televisionShowRepository;

    public function __construct(TelevisionShowRepository $televisionShowRepo)
    {
        $this->televisionShowRepository = $televisionShowRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/televisionShows",
     *      summary="Get a listing of the TelevisionShows.",
     *      tags={"TelevisionShow"},
     *      description="Get all TelevisionShows",
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
     *                  @SWG\Items(ref="#/definitions/TelevisionShow")
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
        $this->televisionShowRepository->pushCriteria(new RequestCriteria($request));
        $this->televisionShowRepository->pushCriteria(new LimitOffsetCriteria($request));
        $televisionShows = $this->televisionShowRepository->all();

        return $this->sendResponse($televisionShows->toArray(), 'Television Shows retrieved successfully');
    }

    /**
     * @param CreateTelevisionShowAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/televisionShows",
     *      summary="Store a newly created TelevisionShow in storage",
     *      tags={"TelevisionShow"},
     *      description="Store TelevisionShow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TelevisionShow that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TelevisionShow")
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
     *                  ref="#/definitions/TelevisionShow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateTelevisionShowAPIRequest $request)
    {
        if(Input::isJson()) {
           $input = Input::json()->all();
        }
        else {
            $input = $request->all();
        }
        // $input = $request->all();
        var_dump(Input::isJson());
        var_dump($input);

        $televisionShows = $this->televisionShowRepository->create($input);

        return $this->sendResponse($televisionShows->toArray(), 'Television Show saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/televisionShows/{id}",
     *      summary="Display the specified TelevisionShow",
     *      tags={"TelevisionShow"},
     *      description="Get TelevisionShow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TelevisionShow",
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
     *                  ref="#/definitions/TelevisionShow"
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
        /** @var TelevisionShow $televisionShow */
        $televisionShow = $this->televisionShowRepository->findWithoutFail($id);

        if (empty($televisionShow)) {
            return $this->sendError('Television Show not found');
        }

        return $this->sendResponse($televisionShow->toArray(), 'Television Show retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateTelevisionShowAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/televisionShows/{id}",
     *      summary="Update the specified TelevisionShow in storage",
     *      tags={"TelevisionShow"},
     *      description="Update TelevisionShow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TelevisionShow",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="TelevisionShow that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/TelevisionShow")
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
     *                  ref="#/definitions/TelevisionShow"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateTelevisionShowAPIRequest $request)
    {
        $input = $request->all();

        /** @var TelevisionShow $televisionShow */
        $televisionShow = $this->televisionShowRepository->findWithoutFail($id);

        if (empty($televisionShow)) {
            return $this->sendError('Television Show not found');
        }

        $televisionShow = $this->televisionShowRepository->update($input, $id);

        return $this->sendResponse($televisionShow->toArray(), 'TelevisionShow updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/televisionShows/{id}",
     *      summary="Remove the specified TelevisionShow from storage",
     *      tags={"TelevisionShow"},
     *      description="Delete TelevisionShow",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of TelevisionShow",
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
        /** @var TelevisionShow $televisionShow */
        $televisionShow = $this->televisionShowRepository->findWithoutFail($id);

        if (empty($televisionShow)) {
            return $this->sendError('Television Show not found');
        }

        $televisionShow->delete();

        return $this->sendResponse($id, 'Television Show deleted successfully');
    }
}
