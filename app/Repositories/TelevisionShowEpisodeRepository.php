<?php

namespace App\Repositories;

use App\Models\TelevisionShowEpisode;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TelevisionShowEpisodeRepository
 * @package App\Repositories
 * @version March 13, 2019, 6:15 pm UTC
 *
 * @method TelevisionShowEpisode findWithoutFail($id, $columns = ['*'])
 * @method TelevisionShowEpisode find($id, $columns = ['*'])
 * @method TelevisionShowEpisode first($columns = ['*'])
*/
class TelevisionShowEpisodeRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'tv_show_id',
        'season_number',
        'episode_number'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TelevisionShowEpisode::class;
    }
}
