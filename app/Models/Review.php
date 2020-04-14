<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function establishment() {
        return $this->belongsTo(Establishment::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
