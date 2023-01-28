<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Decoration extends CakeComponent
{
    use HasFactory;

    $fillable = ['amount', 'units'];

    public function component()
    {
        return $this->morphOne(CakeComponent::class, 'componentable');
    }
}
