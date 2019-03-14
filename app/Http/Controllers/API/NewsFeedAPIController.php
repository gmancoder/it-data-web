<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateNewsFeedAPIRequest;
use App\Http\Requests\API\UpdateNewsFeedAPIRequest;
use App\Models\NewsFeed;
use App\Repositories\NewsFeedRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class NewsFeedController
 * @package App\Http\Controllers\API
 */

class NewsFeedAPIController extends AppBaseController
{
    /** @var  NewsFeedRepository */
    private $newsFeedRepository;

    public function __construct(NewsFeedRepository $newsFeedRepo)
    {
        $this->newsFeedRepository = $newsFeedRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/newsFeeds",
     *      summary="Get a listing of the NewsFeeds.",
     *      tags={"NewsFeed"},
     *      description="Get all NewsFeeds",
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
     *                  @SWG\Items(ref="#/definitions/NewsFeed")
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
        $this->newsFeedRepository->pushCriteria(new RequestCriteria($request));
        $this->newsFeedRepository->pushCriteria(new LimitOffsetCriteria($request));
        $newsFeeds = $this->newsFeedRepository->all();

        return $this->sendResponse($newsFeeds->toArray(), 'News Feeds retrieved successfully');
    }

    /**
     * @param CreateNewsFeedAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/newsFeeds",
     *      summary="Store a newly created NewsFeed in storage",
     *      tags={"NewsFeed"},
     *      description="Store NewsFeed",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="NewsFeed that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/NewsFeed")
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
     *                  ref="#/definitions/NewsFeed"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateNewsFeedAPIRequest $request)
    {
        $input = $request->all();

        $newsFeeds = $this->newsFeedRepository->create($input);

        return $this->sendResponse($newsFeeds->toArray(), 'News Feed saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/newsFeeds/{id}",
     *      summary="Display the specified NewsFeed",
     *      tags={"NewsFeed"},
     *      description="Get NewsFeed",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of NewsFeed",
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
     *                  ref="#/definitions/NewsFeed"
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
        /** @var NewsFeed $newsFeed */
        $newsFeed = $this->newsFeedRepository->findWithoutFail($id);

        if (empty($newsFeed)) {
            return $this->sendError('News Feed not found');
        }

        return $this->sendResponse($newsFeed->toArray(), 'News Feed retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateNewsFeedAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/newsFeeds/{id}",
     *      summary="Update the specified NewsFeed in storage",
     *      tags={"NewsFeed"},
     *      description="Update NewsFeed",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of NewsFeed",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="NewsFeed that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/NewsFeed")
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
     *                  ref="#/definitions/NewsFeed"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateNewsFeedAPIRequest $request)
    {
        $input = $request->all();

        /** @var NewsFeed $newsFeed */
        $newsFeed = $this->newsFeedRepository->findWithoutFail($id);

        if (empty($newsFeed)) {
            return $this->sendError('News Feed not found');
        }

        $newsFeed = $this->newsFeedRepository->update($input, $id);

        return $this->sendResponse($newsFeed->toArray(), 'NewsFeed updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/newsFeeds/{id}",
     *      summary="Remove the specified NewsFeed from storage",
     *      tags={"NewsFeed"},
     *      description="Delete NewsFeed",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of NewsFeed",
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
        /** @var NewsFeed $newsFeed */
        $newsFeed = $this->newsFeedRepository->findWithoutFail($id);

        if (empty($newsFeed)) {
            return $this->sendError('News Feed not found');
        }

        $newsFeed->delete();

        return $this->sendResponse($id, 'News Feed deleted successfully');
    }
}
