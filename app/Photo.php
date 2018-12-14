<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['ablum_id', 'photo', 'title', 'size', 'description'];

    public function album()
    {
        $this->belongsTo('App\Album');
    }
}
