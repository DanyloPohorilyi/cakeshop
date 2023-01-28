<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Discount extends Model
{
    protected $fillable = ['percent', 'created_at', 'updated_at'];

    /**
     * The confectioneries that belong to the Discount
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function confectioneries(): BelongsToMany
    {
        return $this->belongsToMany(Confectionery::class, 'confectioneries_discounts', 'discount_id', 'confectionery_id');
    }
}
