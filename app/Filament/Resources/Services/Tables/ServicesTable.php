<?php

namespace App\Filament\Resources\Services\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ServicesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('icon')
                    ->label('')
                    ->icon(fn (string $state): string => match ($state) {
                        'code-2' => 'heroicon-o-code-bracket',
                        'server' => 'heroicon-o-server',
                        'database' => 'heroicon-o-circle-stack',
                        'plug' => 'heroicon-o-puzzle-piece',
                        'cpu' => 'heroicon-o-cpu-chip',
                        'layout' => 'heroicon-o-squares-2x2',
                        default => 'heroicon-o-star',
                    })
                    ->color(fn ($record): string => match ($record->color) {
                        'purple' => 'purple',
                        'cyan' => 'info',
                        'indigo' => 'primary',
                        default => 'primary',
                    })
                    ->size('lg'),

                TextColumn::make('title')
                    ->label('Nama Layanan')
                    ->weight('bold')
                    ->searchable()
                    ->description(fn ($record) => $record->short_description),

                TextColumn::make('color')
                    ->label('Warna')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'purple' => 'purple',
                        'cyan' => 'info',
                        'indigo' => 'primary',
                        default => 'primary',
                    }),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->alignCenter(),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ])
            ->defaultSort('sort_order')
            ->striped();
    }
}