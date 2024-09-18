<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Release extends Model
{
    public function empires() : HasMany {
        return $this->hasMany(Empire::class);
    }
}
