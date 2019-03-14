<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateFileBackupLocationAPIRequest;
use App\Http\Requests\API\UpdateFileBackupLocationAPIRequest;
use App\Models\FileBackupLocation;
use App\Repositories\FileBackupLocationRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class FileBackupLocationController
 * @package App\Http\Controllers\API
 */

class FileBackupLocationAPIController extends AppBaseController
{
    /** @var  FileBackupLocationRepository */
    private $fileBackupLocationRepository;

    public function __construct(FileBackupLocationRepository $fileBackupLocationRepo)
    {
        $this->fileBackupLocationRepository = $fileBackupLocationRepo;
    }

    /**
     * @param Request $request
     * @return Response
     *
     * @SWG\Get(
     *      path="/fileBackupLocations",
     *      summary="Get a listing of the FileBackupLocations.",
     *      tags={"FileBackupLocation"},
     *      description="Get all FileBackupLocations",
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
     *                  @SWG\Items(ref="#/definitions/FileBackupLocation")
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
        $this->fileBackupLocationRepository->pushCriteria(new RequestCriteria($request));
        $this->fileBackupLocationRepository->pushCriteria(new LimitOffsetCriteria($request));
        $fileBackupLocations = $this->fileBackupLocationRepository->all();

        return $this->sendResponse($fileBackupLocations->toArray(), 'File Backup Locations retrieved successfully');
    }

    /**
     * @param CreateFileBackupLocationAPIRequest $request
     * @return Response
     *
     * @SWG\Post(
     *      path="/fileBackupLocations",
     *      summary="Store a newly created FileBackupLocation in storage",
     *      tags={"FileBackupLocation"},
     *      description="Store FileBackupLocation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FileBackupLocation that should be stored",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FileBackupLocation")
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
     *                  ref="#/definitions/FileBackupLocation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function store(CreateFileBackupLocationAPIRequest $request)
    {
        $input = $request->all();

        $fileBackupLocations = $this->fileBackupLocationRepository->create($input);

        return $this->sendResponse($fileBackupLocations->toArray(), 'File Backup Location saved successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Get(
     *      path="/fileBackupLocations/{id}",
     *      summary="Display the specified FileBackupLocation",
     *      tags={"FileBackupLocation"},
     *      description="Get FileBackupLocation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FileBackupLocation",
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
     *                  ref="#/definitions/FileBackupLocation"
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
        /** @var FileBackupLocation $fileBackupLocation */
        $fileBackupLocation = $this->fileBackupLocationRepository->findWithoutFail($id);

        if (empty($fileBackupLocation)) {
            return $this->sendError('File Backup Location not found');
        }

        return $this->sendResponse($fileBackupLocation->toArray(), 'File Backup Location retrieved successfully');
    }

    /**
     * @param int $id
     * @param UpdateFileBackupLocationAPIRequest $request
     * @return Response
     *
     * @SWG\Put(
     *      path="/fileBackupLocations/{id}",
     *      summary="Update the specified FileBackupLocation in storage",
     *      tags={"FileBackupLocation"},
     *      description="Update FileBackupLocation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FileBackupLocation",
     *          type="integer",
     *          required=true,
     *          in="path"
     *      ),
     *      @SWG\Parameter(
     *          name="body",
     *          in="body",
     *          description="FileBackupLocation that should be updated",
     *          required=false,
     *          @SWG\Schema(ref="#/definitions/FileBackupLocation")
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
     *                  ref="#/definitions/FileBackupLocation"
     *              ),
     *              @SWG\Property(
     *                  property="message",
     *                  type="string"
     *              )
     *          )
     *      )
     * )
     */
    public function update($id, UpdateFileBackupLocationAPIRequest $request)
    {
        $input = $request->all();

        /** @var FileBackupLocation $fileBackupLocation */
        $fileBackupLocation = $this->fileBackupLocationRepository->findWithoutFail($id);

        if (empty($fileBackupLocation)) {
            return $this->sendError('File Backup Location not found');
        }

        $fileBackupLocation = $this->fileBackupLocationRepository->update($input, $id);

        return $this->sendResponse($fileBackupLocation->toArray(), 'FileBackupLocation updated successfully');
    }

    /**
     * @param int $id
     * @return Response
     *
     * @SWG\Delete(
     *      path="/fileBackupLocations/{id}",
     *      summary="Remove the specified FileBackupLocation from storage",
     *      tags={"FileBackupLocation"},
     *      description="Delete FileBackupLocation",
     *      produces={"application/json"},
     *      @SWG\Parameter(
     *          name="id",
     *          description="id of FileBackupLocation",
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
        /** @var FileBackupLocation $fileBackupLocation */
        $fileBackupLocation = $this->fileBackupLocationRepository->findWithoutFail($id);

        if (empty($fileBackupLocation)) {
            return $this->sendError('File Backup Location not found');
        }

        $fileBackupLocation->delete();

        return $this->sendResponse($id, 'File Backup Location deleted successfully');
    }
}
