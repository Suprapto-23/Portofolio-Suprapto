<?php

namespace App\Filament\Resources\Projects\Schemas;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ProjectForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('category')
                    ->default(null),
                TextInput::make('client')
                    ->default(null),
                TextInput::make('role')
                    ->default(null),
                Textarea::make('short_description')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('description')
                    ->default(null)
                    ->columnSpanFull(),
                FileUpload::make('image')
    ->image()
    ->disk('public')
    ->directory('projects')
    ->visibility('public'),
                TextInput::make('thumbnail')
                    ->default(null),
                TextInput::make('project_url')
                    ->url()
                    ->default(null),
                TextInput::make('github_url')
                    ->url()
                    ->default(null),
                TextInput::make('demo_url')
                    ->url()
                    ->default(null),
                Textarea::make('gallery')
                    ->default(null)
                    ->columnSpanFull(),
                Textarea::make('features')
                    ->default(null)
                    ->columnSpanFull(),
                TextInput::make('status')
                    ->required()
                    ->default('completed'),
                DatePicker::make('project_date'),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_featured')
                    ->required(),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
