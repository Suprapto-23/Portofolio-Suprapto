<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skill extends Model
{
    protected $fillable = [
        'skill_category_id',
        'name',
        'slug',
        'logo',
        'icon',
        'proficiency',
        'years_experience',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'proficiency' => 'integer',
        'years_experience' => 'decimal:1',
        'is_active' => 'boolean',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(SkillCategory::class, 'skill_category_id');
    }
}
