<?php

namespace App\Filament\Resources\Skills\Tables;

use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class SkillsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('logo')
                    ->label('')
                    ->disk('public')
                    ->size(40)
                    ->defaultImageUrl(url('images/default-icon.png')),

                TextColumn::make('name')
                    ->label('Nama Skill')
                    ->weight('bold')
                    ->searchable(),

                TextColumn::make('category.name')
                    ->label('Kategori')
                    ->badge()
                    ->color('info')
                    ->sortable(),

                TextColumn::make('proficiency')
                    ->label('Level')
                    ->suffix('%')
                    ->badge()
                    ->color(fn (int $state): string => match (true) {
                        $state >= 85 => 'success',
                        $state >= 70 => 'info',
                        default => 'warning',
                    })
                    ->sortable(),

                TextColumn::make('years_experience')
                    ->label('Pengalaman')
                    ->suffix(' thn')
                    ->placeholder('—')
                    ->toggleable(),

                IconColumn::make('is_active')
                    ->label('Aktif')
                    ->boolean()
                    ->alignCenter(),

                TextColumn::make('sort_order')
                    ->label('Urutan')
                    ->numeric()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('skill_category_id')
                    ->label('Kategori')
                    ->relationship('category', 'name'),
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