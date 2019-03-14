<?php

namespace App\Repositories;

use App\Models\InboundPackageLog;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class InboundPackageLogRepository
 * @package App\Repositories
 * @version March 13, 2019, 5:40 pm UTC
 *
 * @method InboundPackageLog findWithoutFail($id, $columns = ['*'])
 * @method InboundPackageLog find($id, $columns = ['*'])
 * @method InboundPackageLog first($columns = ['*'])
*/
class InboundPackageLogRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'subject',
        'inbound_package_id',
        'notetext'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return InboundPackageLog::class;
    }
}
