<?php

namespace App\Repositories;

use App\Models\DownloadItem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DownloadItemRepository
 * @package App\Repositories
 * @version March 13, 2019, 6:11 pm UTC
 *
 * @method DownloadItem findWithoutFail($id, $columns = ['*'])
 * @method DownloadItem find($id, $columns = ['*'])
 * @method DownloadItem first($columns = ['*'])
*/
class DownloadItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'keyword',
        'work_path',
        'exclusions'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DownloadItem::class;
    }
}
