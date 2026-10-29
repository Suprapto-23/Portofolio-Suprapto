<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Project extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'category',
        'client',
        'role',
        'short_description',
        'description',
        'image',
        'thumbnail',
        'project_url',
        'github_url',
        'demo_url',
        'gallery',
        'features',
        'status',
        'project_date',
        'sort_order',
        'is_featured',
        'is_active',
    ];

    protected $casts = [
        'gallery' => 'array',
        'features' => 'array',
        'project_date' => 'date',
        'is_featured' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function technologies(): BelongsToMany
    {
        return $this->belongsToMany(
            Technology::class,
            'project_technologies'
        )->withTimestamps();
    }
}
