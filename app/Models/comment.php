<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class comment extends Model
{
    use HasUuids, Notifiable;

    protected $table = 'comments';

    protected $primaryKey = 'id';

    protected $fillable = [

        'newcake_id',
        'comment',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function newcakes(): BelongsTo
    {
        return $this->belongsTo(newcake::class);
    }

    public function replycomments(): HasMany
    {
        return $this->hasMany(replycomment::class, 'comment_id', 'id');
    }

    public function scopeSelectcakeid($query, $newcakeid)
    {
        return $query->where('newcake_id', $newcakeid);
    }
}
