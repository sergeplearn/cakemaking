<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class testimonial extends Model
{
    use HasUuids;

    protected $table = 'testimonials';

    protected $primaryKey = 'id';

    protected $fillable = [

        'nameofperson',
        'position',
        'more',
        'image_path',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
