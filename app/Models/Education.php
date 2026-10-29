<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'educations';

    protected $fillable = [
        'institution',
        'degree',
        'field_of_study',
        'location',
        'start_year',
        'end_year',
        'gpa',
        'description',
        'logo',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'gpa' => 'decimal:2',
        'is_active' => 'boolean',
    ];
}
