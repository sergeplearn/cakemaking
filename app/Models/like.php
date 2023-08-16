<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class like extends Model
{
    use HasFactory;

    protected $table = 'likes';

    protected $primaryKey = 'id';

    protected $fillable = [

        'like',
        'newcake_id',
        'user_id',
    ];

    public function newcakes(): BelongsTo
    {
        return $this->belongsTo(newcake::class);
    }

    public function User(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeUserid($query, $userid)
    {
        return $query->where('user_id', $userid);
    }

    public function scopeNewcakeid($query, $newcakeid)
    {
        return $query->where('newcake_id', $newcakeid);
    }
}
