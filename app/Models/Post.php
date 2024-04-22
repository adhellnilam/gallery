<?php

namespace App\Models;

use App\LikeTrait as AppLikeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title', 
        'description', 
        'uploaddate', 
        'cover', 
        'album_id', 
        'user_id',
        'likes_count'
    ];


    public function album()
    {
        return $this->belongsTo(Album::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }

    public function likesCount()
    {
        return $this->likes()->count();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

}
