<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="LastRun",
 *      required={""},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tool_name",
 *          description="tool_name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tool_alias",
 *          description="tool_alias",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="last_run_date",
 *          description="last_run_date",
 *          type="string",
 *          format="date"
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
class LastRun extends Model
{
    use SoftDeletes;

    public $table = 'last_runs';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'tool_name',
        'tool_alias',
        'last_run_date',
        'dyn_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'tool_name' => 'string',
        'tool_alias' => 'string',
        'last_run_date' => 'date',
        'dyn_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
