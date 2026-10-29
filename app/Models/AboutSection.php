<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'second_description',
        'image',
        'highlights',
        'is_active',
    ];

    protected $casts = [
        'highlights' => 'array',
        'is_active' => 'boolean',
    ];
}
