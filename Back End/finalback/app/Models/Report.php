<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $guarded = [];

    function user() {
        return $this->belongsTo(User::class)->withDefault();
    }

    function service() {
        return $this->belongsTo(Service::class)->withDefault();
    }

    function admin() {
        return $this->belongsTo(Admin::class)->withDefault();
    }
}
