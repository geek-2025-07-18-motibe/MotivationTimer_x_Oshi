<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TimerLog extends Model
{
    protected $fillable = [
        'user_id',
        'name',
        'description',
        'timer_time',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
