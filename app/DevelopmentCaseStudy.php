<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="DevelopmentCaseStudy",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="name",
 *          description="name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="developed_for",
 *          description="developed_for",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="year",
 *          description="year",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="developed_language",
 *          description="developed_language",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="database_platform",
 *          description="database_platform",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="lanugage_category_id",
 *          description="lanugage_category_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="display_order",
 *          description="display_order",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="private",
 *          description="private",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="github_repo_url",
 *          description="github_repo_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="thumbnail_url",
 *          description="thumbnail_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="dyn_id",
 *          description="dyn_id",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="created_at",
 *          description="created_at",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="updated_at",
 *          description="updated_at",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class DevelopmentCaseStudy extends Model
{
    use SoftDeletes;

    public $table = 'development_case_studies';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'thumbnail_url',
        'dyn_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'developed_for' => 'string',
        'year' => 'integer',
        'developed_language' => 'string',
        'database_platform' => 'string',
        'lanugage_category_id' => 'integer',
        'display_order' => 'integer',
        'private' => 'string',
        'github_repo_url' => 'string',
        'thumbnail_url' => 'string',
        'dyn_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function language() {
        return $this->belongsTo(App\LanguageCategory::class, 'language_category_id', 'id');
    }
}
