<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    //
    protected $fillable = ['content', 'user_id'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /*public function likings()
    {
        return $this->belongsToMany(Micropost::class, 'likes', 'user_id', 'micropost_id')->withTimestamps();
    }*/
    
    
    
    public function likers()
    {
        return $this->belongsToMany(Micropost::class, 'likes', 'micropost_id', 'user_id')->withTimestamps();
    }
    
    /*public function likings()
    {
        return $this->belongsToMany(Micropost::class, 'likes', 'micropost_id', 'user_id')->withTimestamps();
    }
    
    public function likers()
    {
        return $this->belongsToMany(Micropost::class, 'likes', 'user_id', 'micropost_id')->withTimestamps();
    }*/
}
