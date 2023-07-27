<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    function comments() {
        return $this->hasMany(Comment::class);
    }

    function tags() {
        return $this->belongsToMany(Tag::class, 'my_post_tag');
    }

    function images() {
        return $this->morphMany(Image::class, 'imageable');
    }

    // protected static function booted(): void
    // {
    //     static::created(function (Post $post) {
    //         dd("Post " . $post->title . " created");
    //     });
    // }
}
