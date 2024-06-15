<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function fields()
    {
        return $this->hasMany(Field::class, 'sport_id', 'id');
    }
}
