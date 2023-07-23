<?php

namespace App\Models;

use App\Traits\Lang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory, SoftDeletes, Lang;

    // protected $fillable = ['name', 'slug', 'image', 'instructor', 'hours', 'content'];
    protected $guarded = [];

    // protected $table = 'my_courses';

    public function getRouteKeyName()
    {
        return 'slug';
    }

    // image_path
    function getImageAttribute($value) {
        $path = public_path('images/'.$value);
        if(file_exists($path)) {
            $path = asset('images/'.$value);
        }else {
            $path = asset('images/no-image.png');
        }
        return $path;
    }

    // protected function image(): Attribute
    // {
    //     return Attribute::make(
    //         get: fn (string $value) => 'ddddd',
    //     );
    // }

    public function scopeHours(Builder $query, $hours = 20): void
    {
        $query->where('hours', '>=', $hours);
    }


    protected static function booted(): void
    {
        // static::addGlobalScope('hours', function (Builder $builder) {
        //     // $builder->where('created_at', '<', now()->subYears(2000));
        //     $builder->where('hours', '>=', 20);
        // });
    }
}
