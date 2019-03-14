<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Server",
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
 *          property="customer",
 *          description="customer",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ip_address",
 *          description="ip_address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cpanel_url",
 *          description="cpanel_url",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cpanel_username",
 *          description="cpanel_username",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="cpanel_password",
 *          description="cpanel_password",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rdp_port",
 *          description="rdp_port",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rdp_user",
 *          description="rdp_user",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="rdp_password",
 *          description="rdp_password",
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
class Server extends Model
{
    use SoftDeletes;

    public $table = 'servers';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'customer',
        'ip_address',
        'cpanel_url',
        'cpanel_username',
        'cpanel_password',
        'rdp_port',
        'rdp_user',
        'rdp_password',
        'dyn_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'customer' => 'string',
        'ip_address' => 'string',
        'cpanel_url' => 'string',
        'cpanel_username' => 'string',
        'cpanel_password' => 'string',
        'rdp_port' => 'string',
        'rdp_user' => 'string',
        'rdp_password' => 'string',
        'dyn_id' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'cpanel_url' => 'cpanel_username string text ii'
    ];

    
}
