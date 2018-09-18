<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable = ['content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    
    public function users_favorites()
    {
        return $this->belongsToMany(User::class, 'posts_favorites', 'favorites_id', 'user_id')->withTimestamps();
        
    }
}
