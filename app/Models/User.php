<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;

class User extends Model
{
    //define table and primary key
    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';

    //define relationship with orders
    public function orders(){
        return $this->hasMany(Orders::class);
    }
}
