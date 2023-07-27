<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    function flag() {
        return $this->hasOne(Flag::class, 'c_id')->withDefault();
        // return $this->hasOne(Flag::class);
    }
}
