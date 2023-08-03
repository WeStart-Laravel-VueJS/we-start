<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

    function service() {
        return $this->belongsTo(Service::class)->withDefault();
    }

    function promocode() {
        return $this->belongsTo(Promocode::class)->withDefault();
    }

    function order() {
        return $this->belongsTo(Order::class)->withDefault();
    }
}
