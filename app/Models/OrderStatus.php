<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class OrderStatus extends Model
{
    protected $table = 'order_statuses';
    protected $fillable = ['name', 'color', 'created_at', 'updated_at'];
    /**
     * Get all of the orders for the OrderStatus
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
