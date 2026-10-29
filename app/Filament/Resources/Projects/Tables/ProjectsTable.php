<?php

namespace App\Filament\Resources\Projects\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;

class ProjectsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('')
                    ->disk('public')
                    ->square()
                    ->size(56),

                TextColumn::make('title')
                    ->label('Judul Proyek')
                    ->weight('bold')
                    ->searchable()
                    ->sortable()
                    ->description(fn ($record) => $record->short_description ?? null)
                    ->wrap(),

                TextColumn::make('category')
                    ->label('Kategori')
                    ->badge()
                    ->color('info')
                    ->searchable(),

                TextColumn::make('client')
                    ->label('Client')
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('role')
                    ->label('Peran')
                    ->placeholder('—')
                    ->toggleable(),

                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'in_progress' => 'warning',
                        default => 'gray',
                    }),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean()
                    ->trueIcon('heroicon-o-star')
                    ->falseIcon('heroicon-o-minus')
                    ->trueColor('warning')
                    ->alignCenter(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->alignCenter(),

                TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                SelectFilter::make('category')
                    ->label('Kategori')
                    ->options(fn () => \App\Models\Project::query()
                        ->whereNotNull('category')
                        ->distinct()
                        ->pluck('category', 'category')
                        ->toArray()),

                TernaryFilter::make('is_featured')
                    ->label('Featured'),

                TernaryFilter::make('is_active')
                    ->label('Status Aktif'),
            ])
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->toolbarActions([
                DeleteBulkAction::make(),
            ])
            ->defaultSort('sort_order')
            ->searchOnBlur()
            ->striped();
    }
}