<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $fillable=[
        'subcategory_name',
        'category_name',

    ];

    public function category(){
        return $this->belongsTo(Category::class, 'category_name');
    }
}
