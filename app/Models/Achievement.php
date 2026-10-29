<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    protected $fillable = [
        'title',
        'organization',
        'achieved_at',
        'image',
        'description',
        'url',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'achieved_at' => 'date',
        'is_active' => 'boolean',
    ];
}
