<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title',
        'rooms',
        'beds',
        'bathrooms',
        'square',
        'user_id',
        'image_path',
        'address',
        'longitude',
        'latitude',
        'visible',
    ];

    public function messages() {
        return $this->hasMany('App\Message');
    }

    public function stats() {
        return $this->hasMany('App\Stat');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function facilities() {
        return $this->belongsToMany('App\Facility');
    }

    public function promos() {
        return $this->belongsToMany('App\Promo')
                    ->withPivot('time_ending')
                    ->withTimestamps();
    }

}
