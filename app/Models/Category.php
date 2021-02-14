<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    //define table and primary key
    protected $table = 'tbl_category';
    protected $primaryKey = 'cat_id';

    //define relationship with product
    public function product(){
        $this->hasMany(Product::class);
    }
}
