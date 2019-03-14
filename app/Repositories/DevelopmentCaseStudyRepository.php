<?php

namespace App\Repositories;

use App\Models\DevelopmentCaseStudy;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DevelopmentCaseStudyRepository
 * @package App\Repositories
 * @version March 13, 2019, 6:01 pm UTC
 *
 * @method DevelopmentCaseStudy findWithoutFail($id, $columns = ['*'])
 * @method DevelopmentCaseStudy find($id, $columns = ['*'])
 * @method DevelopmentCaseStudy first($columns = ['*'])
*/
class DevelopmentCaseStudyRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'developed_for',
        'year',
        'developed_language',
        'database_platform',
        'lanugage_category_id',
        'summary',
        'display_order',
        'private',
        'github_repo_url',
        'thumbnail_url'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DevelopmentCaseStudy::class;
    }
}
