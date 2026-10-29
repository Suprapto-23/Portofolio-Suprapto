<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class RecentProjects extends BaseWidget
{
    protected static ?int $sort = 3;

    protected int|string|array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->heading('Proyek Terbaru')
            ->query(
                Project::query()->latest()->limit(5)
            )
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->disk('public')
                    ->square(),
                Tables\Columns\TextColumn::make('title')
                    ->weight('bold')
                    ->searchable(),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->color('info'),
                Tables\Columns\TextColumn::make('status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'completed' => 'success',
                        'in_progress' => 'warning',
                        default => 'gray',
                    }),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Ditambahkan')
                    ->since()
                    ->color('gray'),
            ])
            ->paginated(false);
    }
}