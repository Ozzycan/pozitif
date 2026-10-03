<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'description',
        'icon',
        'color_theme',
        'link',
        'tags',
        'order',
    ];

    protected $casts = [
        'tags' => 'array',
    ];
}
