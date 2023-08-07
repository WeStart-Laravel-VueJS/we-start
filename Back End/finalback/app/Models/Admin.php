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

    function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    function getPicAttribute() {
        if($this->image) {
            return $this->image->path;
        }
        return 'https://ui-avatars.com/api/?background=random&name='.$this->name;
    }
}
