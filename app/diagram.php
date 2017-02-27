<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class diagram extends Model
{
    protected $fillable = [
        'ip_user'
    ];

    public function scopeUser($query)
    {
        return $query
            ->select(DB::raw('DATE(created_at) as date, COUNT(DATE(created_at)) as count'))
            ->groupBy('date')
            ->get();
    }

}
