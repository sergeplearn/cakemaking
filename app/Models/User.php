<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasUuids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',

        'user_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function comments(): HasMany
    {
        return $this->hasMany(comment::class);
    }

    public function likes(): HasMany
    {
        return $this->hasMany(like::class, 'user_id', 'id');
    }

    public function unlikes(): HasMany
    {
        return $this->hasMany(unlike::class, 'user_id', 'id');
    }

    public function replycomments(): HasMany
    {
        return $this->hasMany(replycomment::class, 'comment_id', 'id');
    }

    public function newcake(): HasMany
    {
        return $this->HasMany(newcake::class, 'user_id', 'id');
    }

    public function upload_img(): HasOne
    {
        return $this->hasOne(upload_img::class, 'user_id', 'id');
    }

    public function teams(): HasMany
    {
        return $this->hasMany(teams::class, 'user_id', 'id');
    }

    public function testimonial(): HasMany
    {
        return $this->hasMany(testimonial::class, 'user_id', 'id');
    }
}
