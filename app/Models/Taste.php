<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Taste extends Model
{
    protected $fillable = ['name', 'description', 'created_at', 'updated_at'];

    /**
     * The confectioneries that belong to the Taste
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function confectioneries(): BelongsToMany
    {
        return $this->belongsToMany(Confectionery::class);
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
