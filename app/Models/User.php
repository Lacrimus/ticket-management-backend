<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * For safety, by default none of the attributes may be mass assignable, with the exception of these attributes.
     * The attributes 'kiosk' and 'admin' are excluded.
     * @var array
     */
    protected $fillable = [
        'short', 'color', 'staredtickets'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        '',
    ];

    /**
     * Some manual specifications for Eloquent. They mostly match what would be set by the mapper by default
     * but have been hardcoded for clarity and safety.
     */

    /**
     * 
     * @var string
     */
    protected $table = 'users';
    protected $primaryKey = 'user';

    /**
     * The primary key shall not be an incrementing integer (@see $fillable 'number'), ...
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * ... but rather a hash which is generated out of the registration date, the current time and a random integer).
     * 
     * @var string
     */
    protected $keyType = 'string';
}
