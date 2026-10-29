<?php

namespace App\Filament\Resources\Documentations;

use App\Models\Documentation;
use App\Filament\Resources\Documentations\Pages\CreateDocumentation;
use App\Filament\Resources\Documentations\Pages\EditDocumentation;
use App\Filament\Resources\Documentations\Pages\ListDocumentations;
use App\Filament\Resources\Documentations\Schemas\DocumentationForm;
use App\Filament\Resources\Documentations\Tables\DocumentationsTable;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Tables\Table;
use BackedEnum;

class DocumentationResource extends Resource
{
    protected static ?string $model = Documentation::class;

    protected static string|BackedEnum|null $navigationIcon = 'heroicon-o-book-open';
    protected static ?string $navigationLabel = 'Dokumentasi';
    protected static ?string $pluralModelLabel = 'Dokumentasi';
    protected static ?string $modelLabel = 'Dokumentasi';
    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return DocumentationForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return DocumentationsTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListDocumentations::route('/'),
            'create' => CreateDocumentation::route('/create'),
            'edit' => EditDocumentation::route('/{record}/edit'),
        ];
    }
}