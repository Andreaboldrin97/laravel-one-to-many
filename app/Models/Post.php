<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    protected $fillable = array('title', 'description', 'image_url', 'user_id', 'sale_date', 'category_id');
}
