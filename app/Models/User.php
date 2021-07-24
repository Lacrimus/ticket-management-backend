<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Authenticatable, Notifiable, HasFactory;

    /**
     * For safety, by default none of the attributes may be mass assignable, with the exception of these attributes.
     * @var array
     */
    protected $fillable = [
        'name', 'short', 'email','color', 'staredtickets'
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
    protected $primaryKey = 'id';

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
