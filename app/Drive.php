<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
    protected $guarded = [];

    public function drives()
    {
        return $this->belongsTo(User::class);
    }
}
