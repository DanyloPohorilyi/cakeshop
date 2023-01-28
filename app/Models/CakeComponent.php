<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakeComponent extends Model
{
    use HasFactory;
    $table = 'cake_components';
    $fillable = ['name', 'price', 'created_at', 'updated_at'];

    public function componentable()
    {
        return $this->morphTo();
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
