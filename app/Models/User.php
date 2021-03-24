<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Orders;
use App\Models\Comments;

class User extends Model
{
    //define table and primary key
    protected $table = 'tbl_users';
    protected $primaryKey = 'user_id';

    protected $fillable = [
        'username', 'email', 'password', 'phone'
    ];

    //define relationship with orders
    public function orders(){
        return $this->hasMany(Orders::class);
    }

    //define relationship with comments
    public function comments(){
        return $this->hasMany(Comments::class);
    }
}
