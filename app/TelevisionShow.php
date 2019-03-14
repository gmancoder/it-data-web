<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TelevisionShow",
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
 *          property="banner_filename",
 *          description="banner_filename",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="backup",
 *          description="backup",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="backup_location",
 *          description="backup_location",
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
class TelevisionShow extends Model
{
    use SoftDeletes;

    public $table = 'television_shows';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'banner_filename',
        'backup',
        'backup_location',
        'dyn_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'banner_filename' => 'string',
        'backup' => 'string',
        'backup_location' => 'string',
        'dyn_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function episodes() {
        return $this->hasMany(App\TelevisionShowEpisode::class, 'tv_show_id');
    }
}
