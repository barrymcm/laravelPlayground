<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['post_id', 'title', 'content', 'featured'];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}
