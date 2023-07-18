<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Course extends Model
{
    use HasFactory;

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
}
