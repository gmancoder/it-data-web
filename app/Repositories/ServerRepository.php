<?php

namespace App\Repositories;

use App\Models\Server;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ServerRepository
 * @package App\Repositories
 * @version March 13, 2019, 6:07 pm UTC
 *
 * @method Server findWithoutFail($id, $columns = ['*'])
 * @method Server find($id, $columns = ['*'])
 * @method Server first($columns = ['*'])
*/
class ServerRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'customer',
        'ip_address',
        'cpanel_url',
        'cpanel_username',
        'cpanel_password',
        'rdp_port',
        'rdp_user',
        'rdp_password'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Server::class;
    }
}
