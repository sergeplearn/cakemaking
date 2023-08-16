<?php

namespace App\Models;

use App\Events\NewcakeCreated;
use App\QueryFilters\Category;
use App\QueryFilters\sort;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Pipeline\Pipeline;
use Propaganistas\LaravelPhone\PhoneNumber;

class newcake extends Model
{
    use Notifiable;
    use HasUuids;
    use SoftDeletes;

    protected $table = 'newcakes';

    protected $primaryKey = 'id';

    protected $fillable = [

        'nameofperson',
        'nameofcake',
        'tell',
        'price',
        'more',
        'image_path',
        'image_paths',
        'category_id',

    ];

    protected $dispatchesEvents = [
        'created' => NewcakeCreated::class,
    ];

    public function getTellAttribute($value)
    {
        $phone = new PhoneNumber($value, 'CM');

        return $phone->formatNational();
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function comments(): HasMany
    {
        return $this->hasMany(comment::class, 'newcake_id', 'id');
    }

    public function categories(): HasMany
    {
        return $this->hasMany(categories::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(like::class, 'newcake_id', 'id');
    }

    public function unlikes(): HasMany
    {
        return $this->hasMany(unlike::class, 'newcake_id', 'id');
    }

    public function replycomment(): HasMany
    {
        return $this->hasMany(replycomment::class, 'newcake_id', 'id');
    }

    public static function allnewcake()
    {
        return $cake = app(Pipeline::class)
            ->send(newcake::query())->through([
                Category::class,
                sort::class,
            ])->thenReturn()->paginate(8);
    }
}
