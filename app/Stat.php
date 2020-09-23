<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat extends Model
{
    protected $fillable = [
        'apartment_id'
    ];

    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }

}
