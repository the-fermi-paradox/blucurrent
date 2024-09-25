<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Empire extends Model
{
    protected $fillable = [
        'name',
        'release_id',
        'architecture',
        'continent',
        'focus',
        'unique_units',
        'unique_technologies',
        'unique_buildings',
    ];
    public array $cols = [
        'id',
        'name',
        'release_id',
        'architecture',
        'continent',
        'focus',
        'unique_units',
        'unique_technologies',
        'unique_buildings',
    ];
    protected $hidden = ['updated_at', 'created_at'];
    public function release() : BelongsTo {
        return $this->belongsTo(Release::class);
    }
}
