<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    /**
     * Eloquent relationship to User.php
     * @return \Http\Models\Ticket
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * @var array
     */
    protected $fillable = [
        'hash', 'user', 'type'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'plain'
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
    protected $table = 'tokens';

    /**
     * Database primary key
     * 
     * @var string
     */
    protected $primaryKey = 'token';

    /**
     * The primary key shall not be an incrementing integer, ...
     * 
     * @var bool
     */
    public $incrementing = false;

    /**
     * ... but rather a hash.
     * 
     * @var string
     */
    protected $keyType = 'string';
}
