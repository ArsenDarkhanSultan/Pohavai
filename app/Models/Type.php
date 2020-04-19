<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function establishment()
    {
        return $this->hasMany(Establishment::class, 'type_id');
    }
}
