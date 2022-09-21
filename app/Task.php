<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'content', 'priority', 'progress', 'tag_id',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
