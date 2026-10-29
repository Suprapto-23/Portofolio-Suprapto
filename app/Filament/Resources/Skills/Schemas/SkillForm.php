<?php

namespace App\Filament\Resources\Skills\Schemas;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class SkillForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Informasi Skill')
                    ->columns(2)
                    ->schema([
                        Select::make('skill_category_id')
                            ->label('Kategori')
                            ->relationship('category', 'name')
                            ->required()
                            ->searchable()
                            ->preload(),
                        TextInput::make('name')
                            ->label('Nama Skill')
                            ->required()
                            ->live(onBlur: true),
                        TextInput::make('slug')
                            ->required(),
                        TextInput::make('icon')
                            ->label('Icon (kode/nama, opsional)')
                            ->helperText('Contoh: laravel, php, mysql — dipakai untuk render ikon di frontend'),
                    ]),

                Section::make('Logo')
                    ->schema([
                        FileUpload::make('logo')
                            ->label('Logo Skill (opsional)')
                            ->image()
                            ->disk('public')
                            ->directory('skills')
                            ->visibility('public'),
                    ]),

                Section::make('Level Kemampuan')
                    ->columns(2)
                    ->schema([
                        TextInput::make('proficiency')
                            ->label('Proficiency (%)')
                            ->required()
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->default(80)
                            ->suffix('%'),
                        TextInput::make('years_experience')
                            ->label('Lama Pengalaman (tahun)')
                            ->numeric(),
                        Textarea::make('description')
                            ->label('Deskripsi (opsional)')
                            ->rows(2)
                            ->columnSpanFull(),
                    ]),

                Section::make('Pengaturan')
                    ->columns(2)
                    ->schema([
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