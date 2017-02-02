<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = [
        'category'
    ];

    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function menu()
    {
        return $this->hasOne('App\Menu');
    }

    public function news()
    {
        return $this->hasOne('App\News');
    }

}
