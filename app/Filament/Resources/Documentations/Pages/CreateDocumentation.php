<?php

namespace App\Filament\Resources\Documentations\Pages;

use App\Filament\Resources\Documentations\DocumentationResource;
use Filament\Resources\Pages\CreateRecord;

class CreateDocumentation extends CreateRecord
{
    protected static string $resource = DocumentationResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }

    protected function getCreatedNotificationTitle(): ?string
    {
        return 'Dokumentasi berhasil disimpan!';
    }
}