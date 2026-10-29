<?php

namespace App\Filament\Resources\Documentations\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\Action;

class DocumentationsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('file_attachment')
                    ->label('')
                    ->disk('public')
                    ->size(60)
                    ->circular()
                    ->extraImgAttributes(['class' => 'pra-thumb'])
                    ->grow(false),

                TextColumn::make('title')
                    ->label('Judul Dokumentasi')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->color('primary')
                    ->description(fn ($record) => str($record->content)->stripTags()->limit(55))
                    ->wrap(),

                TextColumn::make('is_active')
                    ->label('Status')
                    ->badge()
                    ->formatStateUsing(fn ($state) => $state ? 'Publikasi' : 'Draft')
                    ->color(fn ($state) => $state ? 'success' : 'gray')
                    ->icon(fn ($state) => $state ? 'heroicon-o-check-circle' : 'heroicon-o-clock')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Terakhir Diubah')
                    ->since()
                    ->dateTimeTooltip('d M Y, H:i')
                    ->sortable()
                    ->color('gray')
                    ->icon('heroicon-o-clock')
                    ->alignEnd(),
            ])
            ->defaultSort('updated_at', 'desc')
            ->striped()
            ->paginated([10, 25, 50])

            ->filters([
                TernaryFilter::make('is_active')
                    ->label('Status Publikasi')
                    ->placeholder('Semua Status')
                    ->trueLabel('Hanya Publikasi')
                    ->falseLabel('Hanya Draft'),
            ])

            ->recordActions([
                Action::make('preview')
                    ->label('')
                    ->icon('heroicon-o-eye')
                    ->iconButton()
                    ->tooltip('Lihat di halaman publik')
                    ->url(fn ($record) => route('dokumentasi') . '#doc-' . $record->id)
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => $record->is_active),

                EditAction::make()
                    ->iconButton()
                    ->tooltip('Ubah'),

                DeleteAction::make()
                    ->iconButton()
                    ->tooltip('Hapus'),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])

            ->emptyStateHeading('Belum Ada Dokumentasi')
            ->emptyStateDescription('Klik tombol "Tambah Dokumentasi Baru" di kanan atas untuk mulai menambahkan.')
            ->emptyStateIcon('heroicon-o-book-open');
    }
}