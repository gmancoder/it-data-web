<?php

namespace App\Repositories;

use App\Models\LanguageCategory;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class LanguageCategoryRepository
 * @package App\Repositories
 * @version March 13, 2019, 5:52 pm UTC
 *
 * @method LanguageCategory findWithoutFail($id, $columns = ['*'])
 * @method LanguageCategory find($id, $columns = ['*'])
 * @method LanguageCategory first($columns = ['*'])
*/
class LanguageCategoryRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'folder_name'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return LanguageCategory::class;
    }
}
