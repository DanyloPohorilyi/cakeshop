<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Glaze extends CakeComponent
{
    use HasFactory;

    public function component()
    {
        return $this->morphOne(CakeComponent::class, 'componentable');
    }
}
