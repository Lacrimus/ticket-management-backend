<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    /**
     * Eloquent relationship to Step.php
     * A ticket may have zero, one or more steps
     * @return \Http\Models\Step
     */
    public function steps() {
        return $this->hasMany(Step::class);
    }

    /**
     * Eloquent relationship to User.php
     * Tickets are always created by and bound to a user.
     * @return \Http\Models\Ticket
     */
    public function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * For safety, by default none of the attributes may be mass assignable, with the exception of these attributes.
     *
     * @var array
     */
    protected $fillable = [
        'task', 'description', 'steps', 'done', 'archived', 'creationdate', 'room', 'dueDate'
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
    protected $table = 'tickets';

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
     * ... but rather a hash (which in turn is generated during ticket creation).
     *
     * @var string
     */
    protected $keyType = 'string';
}
