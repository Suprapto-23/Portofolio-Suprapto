<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    protected $fillable = [
        'title',
        'provider',
        'start_date',
        'end_date',
        'certificate_url',
        'certificate_file',
        'logo',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];
}
