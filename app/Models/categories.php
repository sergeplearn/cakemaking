<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class categories extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';

    protected $fillable = [

        'category',

    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function newcakes(): BelongsTo
    {
        return $this->belongsTo(newcake::class, 'category_id', 'id');
    }
}
