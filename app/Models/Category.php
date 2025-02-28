<?php

namespace App\Models;

use App\Models\subcategory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
     protected $fillable =[
        'category_name'
    ];

    public function subcategories(){
        return $this->hasMany(subcategory::class);
    }
}
