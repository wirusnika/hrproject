<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'description', 'user_id'];

    public function user_events()
    {
        return $this->belongsTo(User::class);
    }
}
