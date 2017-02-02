<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'name'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function category()
    {
        return $this->hasMany('App\Category');
    }

    public function news()
    {
        return $this->hasMany('App\News');
    }

}
