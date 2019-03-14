<?php

namespace App\Repositories;

use App\Models\NewsFeed;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NewsFeedRepository
 * @package App\Repositories
 * @version March 13, 2019, 6:03 pm UTC
 *
 * @method NewsFeed findWithoutFail($id, $columns = ['*'])
 * @method NewsFeed find($id, $columns = ['*'])
 * @method NewsFeed first($columns = ['*'])
*/
class NewsFeedRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'url',
        'last_downloaded',
        'articles_read'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return NewsFeed::class;
    }
}
