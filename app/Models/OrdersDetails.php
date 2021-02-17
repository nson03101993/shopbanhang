<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class OrdersDetails extends Model
{
     //define table and primary key
     protected $table = 'tbl_orders_details';
     protected $primaryKey = 'id';

     //define relationship with orders
     public function orders(){
        return $this->belongsTo(Orders::class, 'orders_id');
     }
}
