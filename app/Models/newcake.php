<?php

namespace App\Models;

use App\Events\NewcakeCreated;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class newcake extends Model
{
    use Notifiable;
    use HasUuids;

    protected $table = 'newcakes';

    protected $primaryKey = 'id';

    protected $fillable = [

        'nameofperson',
        'nameofcake',
        'tell',
        'price',
        'more',
        'image_path',

    ];

    protected $dispatchesEvents = [
        'created' => NewcakeCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(comment::class, 'newcake_id', 'id');
    }

    public function likes(): HasMany
    {
        return $this->hasMany(like::class, 'newcake_id', 'id');
    }

    public function unlikes(): HasMany
    {
        return $this->hasMany(unlike::class, 'newcake_id', 'id');
    }
}
