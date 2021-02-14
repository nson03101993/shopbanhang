<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;

class Product extends Model
{
    //define table and primary key
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';

    //define relationship with category
    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    //define relationship with brand
    public function brand(){
        return $this->belongsTo(Brand::class,'brand_id');
    }

}
