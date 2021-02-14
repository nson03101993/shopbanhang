<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Brand extends Model
{
    //define table and primary key
    protected $table = 'tbl_brand';
    protected $primaryKey = 'brand_id';

    //define relationship with product
    public function product(){
        $this->hasMany(Product::class);
    }
}
