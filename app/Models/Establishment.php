<?php

namespace App\Models;

use App\Traits\Imageable;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use Imageable;

    public function reviews() {
        return $this->hasMany(Review::class, 'est_id');
    }

    public function reservations() {
        return $this->hasMany(Reservation::class, 'est_id');
    }

    public function type() {
        return $this->belongsTo(Type::class, 'type_id');
    }

    public function ave_check() {
        return $this->belongsTo(Average_Check::class);
    }

    public function schedules() {
        return $this->belongsToMany(Schedule::class);
    }

    public function cuisines() {
        return $this->belongsToMany(Cuisine::class, 'establishment_cuisines');
    }

    public function features() {
        return $this->belongsToMany(Feature::class, 'establishment_features');
    }


    public function contacts() {
        return $this->hasOne(Contacts::class, 'est_id');
    }

    public function schedule() {
        return $this->hasOne(Schedule::class, 'est_id');
    }

}
