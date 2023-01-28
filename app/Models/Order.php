<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Order extends Model
{
    protected $fillable = ['address', 'phone', 'add_info', 'price', 'created_at', 'updated_at'];

    public function orderable()
    {
        return $this->morphTo();
    }

    /**
     * Get the order_status that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order_status(): BelongsTo
    {
        return $this->belongsTo(OrderStatus::class, 'status_id');
    }
    /**
     * Get the customer that owns the Order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
}
