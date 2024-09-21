<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Release extends Model
{
    protected $hidden = ['updated_at', 'created_at'];
    public function empires() : HasMany {
        return $this->hasMany(Empire::class);
    }
}
