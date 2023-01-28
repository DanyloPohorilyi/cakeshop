<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CakeBuilder extends Model
{
    use HasFactory;

    $table = 'cake_builders';
    $fillable = ['inscription', 'add_info', 'created_at', 'updated_at'];

    /**
     * Get the size associated with the CakeBuilder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function size(): HasOne
    {
        return $this->hasOne(Size::class);
    }

    /**
     * Get the layour associated with the CakeBuilder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function layour(): HasOne
    {
        return $this->hasOne(Layour::class);
    }

    /**
     * Get the shape associated with the CakeBuilder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function shape(): HasOne
    {
        return $this->hasOne(Shape::class);
    }

    /**
     * Get the flavour associated with the CakeBuilder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function flavour(): HasOne
    {
        return $this->hasOne(Flavour::class);
    }

    /**
     * Get the filling associated with the CakeBuilder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function filling(): HasOne
    {
        return $this->hasOne(Filling::class);
    }

    /**
     * Get the glaze associated with the CakeBuilder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function glaze(): HasOne
    {
        return $this->hasOne(Glaze::class);
    }

    /**
     * Get the design associated with the CakeBuilder
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function design(): HasOne
    {
        return $this->hasOne(Design::class);
    }

    /**
     * The decorations that belong to the CakeBuilder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function decorations(): BelongsToMany
    {
        return $this->belongsToMany(Decoration::class, 'cake_builder_decorations', 'cake_builder_id', 'decoration_id');
    }

    /**
     * The toppings that belong to the CakeBuilder
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function toppings(): BelongsToMany
    {
        return $this->belongsToMany(Topping::class, 'cake_builders_toppings', 'cake_builder_id', 'topping_id');
    }
}
