<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="WebsiteCategory",
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
 *          property="display_rank",
 *          description="display_rank",
 *          type="integer",
 *          format="int32"
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
class WebsiteCategory extends Model
{
    use SoftDeletes;

    public $table = 'website_categories';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'display_rank',
        'dyn_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'display_rank' => 'integer',
        'dyn_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function websites() {
        return $this->hasMany(App\Website::class, 'category_id');
    }
}
