<?php

namespace App\Repositories;

use App\Models\WebsiteCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WebsiteCategoryRepository
 * @package App\Repositories
 * @version March 13, 2019, 5:44 pm UTC
 *
 * @method WebsiteCategory findWithoutFail($id, $columns = ['*'])
 * @method WebsiteCategory find($id, $columns = ['*'])
 * @method WebsiteCategory first($columns = ['*'])
*/
class WebsiteCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'display_rank'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return WebsiteCategory::class;
    }
}
