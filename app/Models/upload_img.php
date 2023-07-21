<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class upload_img extends Model
{
    use HasUuids;

    protected $table = 'upload_imgs';

    protected $primaryKey = 'id';

    protected $fillable = [

        'image_path',
        'user_id',

    ];

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
