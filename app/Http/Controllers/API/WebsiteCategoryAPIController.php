<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWebsiteCategoryAPIRequest;
use App\Http\Requests\API\UpdateWebsiteCategoryAPIRequest;
use App\Models\WebsiteCategory;
use App\Repositories\WebsiteCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class WebsiteCategoryController
 * @package App\Http\Controllers\API
 */

class WebsiteCategoryAPIController extends AppBaseController
{
    /** @var  WebsiteCategoryRepository */
    private $websiteCategoryRepository;

    public function __construct(WebsiteCategoryRepository $websiteCategoryRepo)
    {
        $this->websiteCategoryRepository = $websiteCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/websiteCategories",
     *      summary="Get a listing of the WebsiteCategories.",
     *      tags={"WebsiteCategory"},
     *      description="Get all WebsiteCategories",
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
     *                  @SWG\Items(ref="#/definitions/WebsiteCategory")
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
        $this->websiteCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->websiteCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $websiteCategories = $this->websiteCategoryRepository->all();

        return $this->sendResponse($websiteCategories->toArray(), 'Website Categories retrieved successfully');
    }

    /**
     * @param CreateWebsiteCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/websiteCategories",
     *      summary="Store a newly created WebsiteCategory in storage",
     *      tags={"WebsiteCategory"},
     *      description="Store WebsiteCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="WebsiteCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/WebsiteCategory")
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
     *                  ref="#/definitions/WebsiteCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateWebsiteCategoryAPIRequest $request)
    {
        $input = $request->all();

        $websiteCategories = $this->websiteCategoryRepository->create($input);

        return $this->sendResponse($websiteCategories->toArray(), 'Website Category saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/websiteCategories/{id}",
     *      summary="Display the specified WebsiteCategory",
     *      tags={"WebsiteCategory"},
     *      description="Get WebsiteCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WebsiteCategory",
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
     *                  ref="#/definitions/WebsiteCategory"
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
        /** @var WebsiteCategory $websiteCategory */
        $websiteCategory = $this->websiteCategoryRepository->findWithoutFail($id);

        if (empty($websiteCategory)) {
            return $this->sendError('Website Category not found');
        }

        return $this->sendResponse($websiteCategory->toArray(), 'Website Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateWebsiteCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/websiteCategories/{id}",
     *      summary="Update the specified WebsiteCategory in storage",
     *      tags={"WebsiteCategory"},
     *      description="Update WebsiteCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WebsiteCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="WebsiteCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/WebsiteCategory")
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
     *                  ref="#/definitions/WebsiteCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateWebsiteCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var WebsiteCategory $websiteCategory */
        $websiteCategory = $this->websiteCategoryRepository->findWithoutFail($id);

        if (empty($websiteCategory)) {
            return $this->sendError('Website Category not found');
        }

        $websiteCategory = $this->websiteCategoryRepository->update($input, $id);

        return $this->sendResponse($websiteCategory->toArray(), 'WebsiteCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/websiteCategories/{id}",
     *      summary="Remove the specified WebsiteCategory from storage",
     *      tags={"WebsiteCategory"},
     *      description="Delete WebsiteCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of WebsiteCategory",
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
        /** @var WebsiteCategory $websiteCategory */
        $websiteCategory = $this->websiteCategoryRepository->findWithoutFail($id);

        if (empty($websiteCategory)) {
            return $this->sendError('Website Category not found');
        }

        $websiteCategory->delete();

        return $this->sendResponse($id, 'Website Category deleted successfully');
    }
}
