<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Average_Check extends Model
{
    public function establishments() {
        return $this->hasMany(Establishment::class, 'ave_check_id');
    }
}
