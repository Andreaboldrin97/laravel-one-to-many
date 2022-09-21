<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected function posts()
    {
        return $this->hasMany('App\User');
    }
    protected $fillable = array('title', 'description', 'image_url', 'author', 'sale_date');
}
