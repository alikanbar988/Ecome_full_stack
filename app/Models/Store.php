<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
        'store_name',
        'details',
        'slug',
        'user_id',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
   // public function products()
    //{
      //  return $this->hasMany(Product::class);
   // }
    //public function orders()
   // {
     //   return $this->hasMany(Order::class);
   // }
}
