<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Tags;

class News extends Model
{   
    use SoftDeletes;

    //define table and primary key
    protected $table = 'tbl_news';

    protected $fillable = [
        'title', 'images', 'content', 'status'
    ];

    //define relationship with tags;
    public function tags(){
        return $this->belongsToMany(Tags::class, 'tbl_news_tags', 'news_id', 'tags_id');
    }
}
