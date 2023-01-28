<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakeOrder extends Order
{
    protected $table = 'cake_orders';
    protected $fillable = ['created_at', 'updated_at'];

    public function order()
    {
        return $this->morphOne(Order::class, 'orderable');
    }

    /**
     * Get the cake_builder associated with the CakeOrder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cake_builder(): HasOne
    {
        return $this->hasOne(CakeBuilder::class);
    }

}
