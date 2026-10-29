<?php

namespace App\Filament\Resources\Documentations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Utilities\Set;
use Illuminate\Support\Str;

class DocumentationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([

                    // KOLOM KIRI (2/3): Konten Utama
                    Section::make('Informasi Dokumentasi')
                        ->description('Judul dan keterangan akan tampil di halaman publik.')
                        ->icon('heroicon-o-document-text')
                        ->schema([
                            TextInput::make('title')
                                ->label('Judul Dokumentasi')
                                ->placeholder('Contoh: Instalasi Sistem Absensi')
                                ->required()
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn (string $operation, $state, Set $set) =>
                                    $operation === 'create' ? $set('slug', Str::slug($state)) : null)
                                ->prefixIcon('heroicon-o-pencil')
                                ->columnSpanFull(),

                            TextInput::make('slug')
                                ->label('Slug URL')
                                ->helperText('Otomatis terisi dari judul, bisa diubah manual.')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->prefixIcon('heroicon-o-link')
                                ->columnSpanFull(),

                            RichEditor::make('content')
                                ->label('Keterangan')
                                ->placeholder('Jelaskan detail dokumentasi ini...')
                                ->required()
                                ->disk('public')
                                ->fileAttachmentsDirectory('documentations')
                                ->columnSpanFull()
                                ->extraInputAttributes(['style' => 'min-height: 220px']),
                        ])
                        ->columnSpan(2),

                    // KOLOM KANAN (1/3): Media & Publikasi
                    \Filament\Schemas\Components\Group::make([
                        Section::make('Gambar')
                            ->description('Tampil sebagai thumbnail di halaman publik.')
                            ->icon('heroicon-o-photo')
                            ->schema([
                                FileUpload::make('file_attachment')
                                    ->label('')
                                    ->image()
                                    ->disk('public')
                                    ->directory('documentations')
                                    ->required()
                                    ->imageEditor()
                                    ->imageEditorAspectRatios(['16:9', '1:1', '4:3'])
                                    ->imagePreviewHeight('220')
                                    ->panelLayout('integrated')
                                    ->columnSpanFull(),
                            ]),

                        Section::make('Publikasi')
                            ->icon('heroicon-o-eye')
                            ->schema([
                                Toggle::make('is_active')
                                    ->label('Tampilkan di halaman publik')
                                    ->helperText('Nonaktifkan untuk menyimpan sebagai draft.')
                                    ->default(true)
                                    ->inline(false)
                                    ->onColor('success')
                                    ->offColor('gray'),
                            ]),
                    ])->columnSpan(1),

                ]),
            ]);
    }
}