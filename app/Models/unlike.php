<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class unlike extends Model
{
    use HasFactory;

    protected $table = 'unlikes';

    protected $primaryKey = 'id';

    protected $fillable = [

        'unlike',
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
}
