<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    public function image() {
        return $this->morphMany(Images::class, 'imageable');
    }
}
