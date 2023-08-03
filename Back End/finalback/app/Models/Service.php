<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    function category() {
        return $this->belongsTo(Category::class)->withDefault();
    }

    function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

    function images() {
        return $this->morphMany(Image::class, 'imageable');
    }

    function promocodes() {
        return $this->belongsToMany(Promocode::class);
    }

    function reviews() {
        return $this->hasMany(Review::class);
    }

    function tags() {
        return $this->belongsToMany(Tag::class);
    }

    function reports() {
        return $this->hasMany(Report::class);
    }

    function carts() {
        return $this->hasMany(Cart::class);
    }

    function wishlists() {
        return $this->hasMany(Wishlist::class);
    }

    function order_details() {
        return $this->hasMany(OrderDetail::class);
    }
}
