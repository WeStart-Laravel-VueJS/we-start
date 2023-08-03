<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocode extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

    function services() {
        return $this->belongsToMany(Service::class);
    }

    function carts() {
        return $this->hasMany(Cart::class);
    }

    function order_details() {
        return $this->hasMany(OrderDetail::class);
    }
}
