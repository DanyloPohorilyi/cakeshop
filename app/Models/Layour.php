<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layour extends CakeComponent
{
    use HasFactory;

    $table = 'layers';

    public function component()
    {
        return $this->morphOne(CakeComponent::class, 'componentable');
    }
}
