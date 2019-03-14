<?php

namespace App\Repositories;

use App\Models\TelevisionShow;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TelevisionShowRepository
 * @package App\Repositories
 * @version March 13, 2019, 6:13 pm UTC
 *
 * @method TelevisionShow findWithoutFail($id, $columns = ['*'])
 * @method TelevisionShow find($id, $columns = ['*'])
 * @method TelevisionShow first($columns = ['*'])
*/
class TelevisionShowRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'banner_filename',
        'backup',
        'backup_location'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TelevisionShow::class;
    }
}
