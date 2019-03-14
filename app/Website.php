<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Website",
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
 *          property="owning_account",
 *          description="owning_account",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="display_in_portal",
 *          description="display_in_portal",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="category_id",
 *          description="category_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="internal_url",
 *          description="internal_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="external_url",
 *          description="external_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="admin_url",
 *          description="admin_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="admin_username",
 *          description="admin_username",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="admin_password",
 *          description="admin_password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="status",
 *          description="status",
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
class Website extends Model
{
    use SoftDeletes;

    public $table = 'websites';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'owning_account',
        'display_in_portal',
        'category_id',
        'internal_url',
        'external_url',
        'admin_url',
        'admin_username',
        'admin_password',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'owning_account' => 'string',
        'display_in_portal' => 'string',
        'category_id' => 'integer',
        'internal_url' => 'string',
        'external_url' => 'string',
        'admin_url' => 'string',
        'admin_username' => 'string',
        'admin_password' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function category() {
        return $this->belongsTo(App\WebsiteCategory::class, 'category_id', 'id');
    }
}
