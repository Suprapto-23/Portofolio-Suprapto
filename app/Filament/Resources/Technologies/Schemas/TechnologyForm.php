<?php

namespace App\Filament\Resources\Technologies\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class TechnologyForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->required(),
                TextInput::make('slug')
                    ->required(),
                TextInput::make('logo')
                    ->default(null),
                TextInput::make('icon')
                    ->default(null),
                TextInput::make('website')
                    ->url()
                    ->default(null),
                TextInput::make('color')
                    ->default(null),
                TextInput::make('sort_order')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->required(),
            ]);
    }
}
