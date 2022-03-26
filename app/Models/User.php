<?php

namespace App\Models;

use App\Models\Token;

use Laravel\Sanctum\HasApiTokens;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use Authenticatable, HasApiTokens , Notifiable, HasFactory;

    /**
     * Eloquent relationship to Ticket.php
     * A user may have none, one or many tickets associated with them.
     * @return \Http\Models\Ticket
     */
    public function tickets() {
        return $this->hasMany(Ticket::class);
    }

    /**
     * Get the user's token (as it is in the database, not in the current request).
     * @return \Http\Models\Token
     */
    public function token() {
        return $this->$token;
    }

    /**
     * For safety, by default none of the attributes may be mass assignable, with the exception of these attributes.
     * @var array
     */
    protected $fillable = [
        'name', 'mail','color', 'markedTickets'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'token'
    ];

    /**
     * Some manual specifications for Eloquent. They mostly match what would be set by the mapper by default
     * but have been hardcoded for clarity and safety.
     */

    /**
     * Database connection type
     *
     * @var string
     */
    protected $connection = 'mysql';

    /**
     * Database table for the model
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * Database primary key
     *
     * @var string
     */
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
