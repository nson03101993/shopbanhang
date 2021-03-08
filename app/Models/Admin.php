<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'tbl_admin';

    protected $fillable = [
        'email', 'password', 'level', 'status', 'name', 'phone'
    ];
}
