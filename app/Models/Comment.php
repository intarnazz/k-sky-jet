<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(related: User::class);
    }

    public function way()
    {
        return $this->belongsTo(related: Way::class);
    }

    public function service()
    {
        return $this->belongsTo(related: Service::class);
    }
}
