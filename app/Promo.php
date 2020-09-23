<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $fillable = [
        'name',
        'price',
        'timing'
    ];

    public function apartments() {
        return $this->belongsToMany('App\Apartment');
    }
}
