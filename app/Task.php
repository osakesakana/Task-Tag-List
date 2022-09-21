<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'content', 'priority', 'progress',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tags()
    {
        return $this->belongsTo(Tag::class);
    }
}
