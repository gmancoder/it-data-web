<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="InboundPackage",
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
 *          property="carrier",
 *          description="carrier",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="tracking_number",
 *          description="tracking_number",
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
class InboundPackage extends Model
{
    use SoftDeletes;

    public $table = 'inbound_packages';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'carrier',
        'tracking_number',
        'dyn_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'carrier' => 'string',
        'tracking_number' => 'string',
        'dyn_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function logs() {
        return $this->hasMany(App\InboundPackageLog::class);
    }
}
