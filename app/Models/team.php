<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class team extends Model
{
    use HasUuids;

    protected $table = 'teams';

    protected $primaryKey = 'id';

    protected $fillable = [

        'nameofperson',
        'position',
        'tell',
        'more',
        'image_path',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
