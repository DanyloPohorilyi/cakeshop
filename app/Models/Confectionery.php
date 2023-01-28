<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Confectionery extends Model
{
    protected $table = 'confectioneries';
    protected $fillable = ['name', 'price', 'description', 'calories', 'fats', 'proteins', 'carbohydrates',
     'preparing_time', 'created_at', 'updated_at'];

     /**
      * The tastes that belong to the Confectionery
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
     public function tastes(): BelongsToMany
     {
         return $this->belongsToMany(Taste::class, 'tastes_confectioneries');

     }
     /**
      * Get the category that owns the Confectionery
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
      */
     public function category(): BelongsTo
     {
         return $this->belongsTo(Category::class);
     }

     /**
      * The discounts that belong to the Confectionery
      *
      * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
      */
     public function discounts(): BelongsToMany
     {
         return $this->belongsToMany(Discount::class, 'confectioneries_discounts', 'confectionery_id' , 'discount_id');
     }

     public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
