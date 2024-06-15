<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function field()
    {
        return $this->belongsTo(Field::class, 'field_id', 'id');
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class, 'schedule_id', 'id');
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class, 'order_id', 'id');
    }
}
