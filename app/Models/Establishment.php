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

}
