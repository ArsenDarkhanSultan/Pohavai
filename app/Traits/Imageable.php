<?php

namespace App\Traits;


use App\Models\Images;

trait Imageable {

    public function images() {
        return $this->morphMany(Images::class, 'imageable');
    }

}
