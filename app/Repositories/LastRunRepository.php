<?php

namespace App\Repositories;

use App\Models\LastRun;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LastRunRepository
 * @package App\Repositories
 * @version March 13, 2019, 6:04 pm UTC
 *
 * @method LastRun findWithoutFail($id, $columns = ['*'])
 * @method LastRun find($id, $columns = ['*'])
 * @method LastRun first($columns = ['*'])
*/
class LastRunRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'tool_name',
        'tool_alias',
        'last_run_date'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LastRun::class;
    }
}
