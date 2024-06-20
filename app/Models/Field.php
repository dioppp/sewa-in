<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Field extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sport_id', 'id');
    }

    public function venue()
    {
        return $this->belongsTo(Venue::class, 'venue_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'field_id', 'id');
    }
}
