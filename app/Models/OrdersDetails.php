<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use App\Models\Product;


class OrdersDetails extends Model
{
     //define table and primary key
     protected $table = 'tbl_orders_details';
     protected $primaryKey = 'id';

     protected $fillable = [
          'quantity', 'unit_price'
     ];

}
