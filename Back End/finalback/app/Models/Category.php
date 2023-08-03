<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    function subcategories() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    function services() {
        return $this->hasMany(Service::class);
    }

    function image() {
        return $this->morphOne(Image::class, 'imageable');
    }
}
