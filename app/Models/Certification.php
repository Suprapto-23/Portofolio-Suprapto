<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certification extends Model
{
    protected $fillable = [
        'name',
        'issuer',
        'credential_id',
        'credential_url',
        'issued_at',
        'expires_at',
        'certificate_file',
        'logo',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'issued_at' => 'date',
        'expires_at' => 'date',
        'is_active' => 'boolean',
    ];
}
