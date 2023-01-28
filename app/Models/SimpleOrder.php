<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SimpleOrder extends Order
{
    protected $table = 'simple_orders';
    protected $fillable = ['amount', 'created_at', 'updated_at'];

    public function order()
    {
        return $this->morphOne(Order::class, 'orderable');

    }

    public function status_order()
    {
        return $this->hasOneThrough(OrderStatus::class, Order::class);
    }

    /**
     * Get the confectionery that owns the SimpleOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function confectionery(): BelongsTo
    {
        return $this->belongsTo(Confectionery::class);
    }
    /**
     * Get the confectionery associated with the SimpleOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    // public function confectionery(): HasOne
    // {
    //     return $this->hasOne(Confectionery::class);
    // }

}
