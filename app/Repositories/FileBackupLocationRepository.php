<?php

namespace App\Repositories;

use App\Models\FileBackupLocation;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FileBackupLocationRepository
 * @package App\Repositories
 * @version March 13, 2019, 6:09 pm UTC
 *
 * @method FileBackupLocation findWithoutFail($id, $columns = ['*'])
 * @method FileBackupLocation find($id, $columns = ['*'])
 * @method FileBackupLocation first($columns = ['*'])
*/
class FileBackupLocationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'datastore_location',
        'path',
        'exclusions',
        'full_backup_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return FileBackupLocation::class;
    }
}
