<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Way extends Model
{
    protected $guarded = ['id'];

    protected $casts = [
        'departure_time' => 'datetime',
    ];

    public function image()
    {
        return $this->belongsTo(related: Image::class);
    }

    public function comments()
    {
        return $this->hasMany(related: Comment::class);
    }
}
