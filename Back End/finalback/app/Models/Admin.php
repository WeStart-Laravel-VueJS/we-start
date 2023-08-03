<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Admin extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $guarded = [];
    // Auth::login()
    // Auth::logout()
    // Auth::id()
    // Auth::check()
    // Auth::user()

    function role() {
        return $this->belongsTo(Role::class)->withDefault();
    }

    function reports() {
        return $this->hasMany(Report::class);
    }
}
