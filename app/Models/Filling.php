<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filling extends CakeComponent
{
    use HasFactory;

    $fillable = ['components'];

    public function component()
    {
        return $this->morphOne(CakeComponent::class, 'componentable');
    }
}
