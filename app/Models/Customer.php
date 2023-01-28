<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Customer extends Model
{
    protected $fillable = ['login', 'password', 'first_name', 'last_name', 'email', 'phone', 'is_admin',
     'created_at', 'updated_at'];

     /**
      * Get all of the orders for the Customer
      *
      * @return \Illuminate\Database\Eloquent\Relations\HasMany
      */
     public function orders(): HasMany
     {
         return $this->hasMany(Order::class);
     }

     public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
