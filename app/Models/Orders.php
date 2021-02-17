<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\OrdersDetails;

class Orders extends Model
{
    //define table and primary key
    protected $table = 'tbl_orders';
    protected $primaryKey = 'orders_id';

    //define relationship with user
    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    //define relationship with product
    public function orders_details(){
        return $this->hasMany(OrdersDetails::class);
    }
}
