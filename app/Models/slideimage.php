<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class slideimage extends Model
{
    use HasFactory;

    protected $table = 'slideimages';

    protected $primaryKey = 'id';

    protected $fillable = [

        'title',
        'blog',
        'image_path',

        'active',
    ];
}
