<?php

namespace App\Filament\Resources\Skills\Pages;

use App\Filament\Resources\Skills\SkillResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSkill extends CreateRecord
{
    protected static string $resource = SkillResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Skill berhasil ditambahkan';
    }
}