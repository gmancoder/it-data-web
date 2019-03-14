<?php

namespace App\Repositories;

use App\Models\InboundPackage;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InboundPackageRepository
 * @package App\Repositories
 * @version March 13, 2019, 5:36 pm UTC
 *
 * @method InboundPackage findWithoutFail($id, $columns = ['*'])
 * @method InboundPackage find($id, $columns = ['*'])
 * @method InboundPackage first($columns = ['*'])
*/
class InboundPackageRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'carrier',
        'tracking_number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InboundPackage::class;
    }
}
