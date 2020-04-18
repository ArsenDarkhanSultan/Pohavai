<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
//    protected $table = 'establishments';
//    public $restaurants = Establishment::
//    public function filter($type){
//
//    }

    public function reviews() {
        return $this->hasMany(Review::class);
    }

    public function schedules() {
        return $this->belongsToMany(Schedule::class);
    }

    public function images() {
        return $this->morphMany(Images::class, 'imageable');
    }

    public function cuisines() {
        return $this->belongsToMany(Cuisine::class, 'establishment_cuisines');
    }

    public function features() {
        return $this->belongsToMany(Feature::class, 'establishment_features');
    }

    public function main_foods() {
        return $this->belongsToMany(Main_foods::class, 'establishment_main_foods');
    }

}
