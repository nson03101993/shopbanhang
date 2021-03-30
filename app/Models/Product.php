<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Orders;

class Product extends Model
{
    //define table and primary key
    protected $table = 'tbl_product';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_name', 'product_desc', 'product_content', 'product_image', 'product_price', 'product_quantity', 'product_status'
    ];

    //define relationship with category
    public function category(){
        return $this->belongsTo(Category::class,'cat_id');
    }

    //define relationship with brand
    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    //define relationship with orders
    public function orders(){
        return $this->belongsToMany(Orders::class, 'tbl_orders_details', 'product_id', 'orders_id')->withPivot('quantity', 'unit_price');
    }

}
