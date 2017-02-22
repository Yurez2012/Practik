<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{

    protected $fillable = [
        'news_id',
        'user_id',
        'like_class'
    ];

    public function news()
    {
        return $this->belongsTo('App\News');
    }

}
