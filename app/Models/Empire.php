<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Empire extends Model
{
    public function release() : BelongsTo {
        return $this->belongsTo(Release::class);
    }
}
