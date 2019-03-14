<?php

namespace App\Repositories;

use App\Models\Website;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class WebsiteRepository
 * @package App\Repositories
 * @version March 13, 2019, 5:51 pm UTC
 *
 * @method Website findWithoutFail($id, $columns = ['*'])
 * @method Website find($id, $columns = ['*'])
 * @method Website first($columns = ['*'])
*/
class WebsiteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'owning_account',
        'display_in_portal',
        'category_id',
        'internal_url',
        'external_url',
        'admin_url',
        'admin_username',
        'admin_password',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Website::class;
    }
}
