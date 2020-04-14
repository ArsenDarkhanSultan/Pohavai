<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    public function establishments() {
        return $this->belongsToMany(Establishment::class);
    }
}
