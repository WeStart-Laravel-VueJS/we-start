<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    // $post->register_subject->mark

    function posts() {
        return $this->belongsToMany(Post::class, 'my_post_tag')
        ->as('register_subject')
        ->withPivot('mark');
    }
}
