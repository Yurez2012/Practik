<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{

    protected $fillable = [
        'title',
        'text',
        'img',
        'category',
        'date_to_add'
    ];


    public function user()
    {
        return $this->hasOne('App\User');
    }

    public function menu()
    {
        return $this->hasOne('App\Menu');
    }

    public function category()
    {
        return $this->hasOne('App\Category');
    }



}
