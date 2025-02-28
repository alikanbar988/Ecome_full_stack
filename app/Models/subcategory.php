<?php

namespace App\Models;


use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class subcategory extends Model
{
    protected $fillable=[
        'subcategory_name',
        'category_id',

    ];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
