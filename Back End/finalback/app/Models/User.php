<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    function services() {
        return $this->hasMany(Service::class);
    }

    function image() {
        return $this->morphOne(Image::class, 'imageable');
    }

    function promocodes() {
        return $this->hasMany(Promocode::class);
    }

    function reviews() {
        return $this->hasMany(Review::class);
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

    function orders() {
        return $this->hasMany(Order::class);
    }

    function order_details() {
        return $this->hasMany(OrderDetail::class);
    }

    function payments() {
        return $this->hasMany(Payment::class);
    }
}
