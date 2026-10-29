<?php

namespace App\Filament\Resources\Services\Schemas;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class ServiceForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Layanan')
                    ->columns(2)
                    ->schema([
                        TextInput::make('title')
                            ->label('Nama Layanan')
                            ->required()
                            ->live(onBlur: true)
                            ->columnSpanFull(),
                        TextInput::make('slug')
                            ->required(),
                        Select::make('icon')
                            ->label('Ikon')
                            ->options([
                                'code-2' => 'Code (Web Development)',
                                'server' => 'Server (Backend)',
                                'database' => 'Database',
                                'plug' => 'Plug (Integrasi/API)',
                                'cpu' => 'CPU (Sistem/AI)',
                                'layout' => 'Layout (Desain UI)',
                            ])
                            ->searchable(),
                        Select::make('color')
                            ->label('Warna Aksen')
                            ->options([
                                'blue' => 'Biru',
                                'purple' => 'Ungu',
                                'cyan' => 'Cyan',
                                'indigo' => 'Indigo',
                            ]),
                    ]),

                Section::make('Deskripsi')
                    ->schema([
                        Textarea::make('short_description')
                            ->label('Deskripsi Singkat')
                            ->rows(2)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->label('Deskripsi Lengkap')
                            ->rows(4)
                            ->columnSpanFull(),
                        TagsInput::make('features')
    ->label('Fitur/Teknologi')
    ->placeholder('Ketik lalu Enter, contoh: Laravel, PHP, Blade')
    ->columnSpanFull(),
                    ]),

                Section::make('Media & Pengaturan')
                    ->columns(2)
                    ->schema([
                        FileUpload::make('image')
                            ->label('Gambar (opsional)')
                            ->image()
                            ->disk('public')
                            ->directory('services')
                            ->visibility('public'),
                        TextInput::make('sort_order')
                            ->label('Urutan')
                            ->required()
                            ->numeric()
                            ->default(0),
                        Toggle::make('is_active')
                            ->label('Aktif (tampil di frontend)')
                            ->default(true),
                    ]),
            ]);
    }
}