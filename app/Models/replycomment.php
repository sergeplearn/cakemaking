<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class replycomment extends Model
{
    use HasUuids;

    protected $table = 'replycomments';

    protected $primaryKey = 'id';

    protected $fillable = [

        'reppply',
        'comment_id',
        'newcake_id',
        'user_id',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(comment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function newcakes(): BelongsTo
    {
        return $this->belongsTo(newcake::class);
    }
}
