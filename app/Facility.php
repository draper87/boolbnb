<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $fillable = [
        'facility'
    ];

    public function apartments() {
        return $this->belongsToMany('App\Apartment');
    }
}
