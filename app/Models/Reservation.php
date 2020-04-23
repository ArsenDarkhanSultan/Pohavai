<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function establishment() {
        return $this->belongsTo(Establishment::class, 'est_id');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
