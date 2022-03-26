<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model {
    use HasFactory;

    /**
     * Eloquent relationship to Ticket.php
     * Each ticket instance has zero, one or more steps.
     */
    public function ticket() {
        return $this->belongsTo(Ticket::class);
    }

    /**
     * Mass-assignable properties
     *
     * @var array
     */
    protected $fillable = [
        'description', 'checked'
    ];

}

