<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateLanguageCategoryAPIRequest;
use App\Http\Requests\API\UpdateLanguageCategoryAPIRequest;
use App\Models\LanguageCategory;
use App\Repositories\LanguageCategoryRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class LanguageCategoryController
 * @package App\Http\Controllers\API
 */

class LanguageCategoryAPIController extends AppBaseController
{
    /** @var  LanguageCategoryRepository */
    private $languageCategoryRepository;

    public function __construct(LanguageCategoryRepository $languageCategoryRepo)
    {
        $this->languageCategoryRepository = $languageCategoryRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/languageCategories",
     *      summary="Get a listing of the LanguageCategories.",
     *      tags={"LanguageCategory"},
     *      description="Get all LanguageCategories",
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
     *                  @SWG\Items(ref="#/definitions/LanguageCategory")
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
        $this->languageCategoryRepository->pushCriteria(new RequestCriteria($request));
        $this->languageCategoryRepository->pushCriteria(new LimitOffsetCriteria($request));
        $languageCategories = $this->languageCategoryRepository->all();

        return $this->sendResponse($languageCategories->toArray(), 'Language Categories retrieved successfully');
    }

    /**
     * @param CreateLanguageCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/languageCategories",
     *      summary="Store a newly created LanguageCategory in storage",
     *      tags={"LanguageCategory"},
     *      description="Store LanguageCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LanguageCategory that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LanguageCategory")
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
     *                  ref="#/definitions/LanguageCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateLanguageCategoryAPIRequest $request)
    {
        $input = $request->all();

        $languageCategories = $this->languageCategoryRepository->create($input);

        return $this->sendResponse($languageCategories->toArray(), 'Language Category saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/languageCategories/{id}",
     *      summary="Display the specified LanguageCategory",
     *      tags={"LanguageCategory"},
     *      description="Get LanguageCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LanguageCategory",
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
     *                  ref="#/definitions/LanguageCategory"
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
        /** @var LanguageCategory $languageCategory */
        $languageCategory = $this->languageCategoryRepository->findWithoutFail($id);

        if (empty($languageCategory)) {
            return $this->sendError('Language Category not found');
        }

        return $this->sendResponse($languageCategory->toArray(), 'Language Category retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateLanguageCategoryAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/languageCategories/{id}",
     *      summary="Update the specified LanguageCategory in storage",
     *      tags={"LanguageCategory"},
     *      description="Update LanguageCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LanguageCategory",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="LanguageCategory that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/LanguageCategory")
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
     *                  ref="#/definitions/LanguageCategory"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateLanguageCategoryAPIRequest $request)
    {
        $input = $request->all();

        /** @var LanguageCategory $languageCategory */
        $languageCategory = $this->languageCategoryRepository->findWithoutFail($id);

        if (empty($languageCategory)) {
            return $this->sendError('Language Category not found');
        }

        $languageCategory = $this->languageCategoryRepository->update($input, $id);

        return $this->sendResponse($languageCategory->toArray(), 'LanguageCategory updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/languageCategories/{id}",
     *      summary="Remove the specified LanguageCategory from storage",
     *      tags={"LanguageCategory"},
     *      description="Delete LanguageCategory",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of LanguageCategory",
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
        /** @var LanguageCategory $languageCategory */
        $languageCategory = $this->languageCategoryRepository->findWithoutFail($id);

        if (empty($languageCategory)) {
            return $this->sendError('Language Category not found');
        }

        $languageCategory->delete();

        return $this->sendResponse($id, 'Language Category deleted successfully');
    }
}
