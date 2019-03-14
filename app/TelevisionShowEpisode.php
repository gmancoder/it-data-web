<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="TelevisionShowEpisode",
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
 *          property="tv_show_id",
 *          description="tv_show_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="season_number",
 *          description="season_number",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="episode_number",
 *          description="episode_number",
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
class TelevisionShowEpisode extends Model
{
    use SoftDeletes;

    public $table = 'television_show_episodes';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'tv_show_id',
        'season_number',
        'episode_number',
        'dyn_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'tv_show_id' => 'integer',
        'season_number' => 'string',
        'episode_number' => 'string',
        'dyn_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function televisionShow() {
        return $this->belongsTo(App\TelevisionShow::class, 'tv_show_id', 'id');
    }
}
