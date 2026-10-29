<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use App\Models\Service;
use App\Models\Skill;
use App\Models\Technology;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardStats extends BaseWidget
{
    protected function getColumns(): int
    {
        return 4;
    }

    protected function getStats(): array
    {
        return [
            Stat::make('Total Project', Project::count())
                ->description('Seluruh proyek terdaftar')
                ->descriptionIcon('heroicon-m-briefcase')
                ->color('primary'),

            Stat::make('Proyek Unggulan', Project::where('is_featured', true)->count())
                ->description('Ditandai featured')
                ->descriptionIcon('heroicon-m-star')
                ->color('warning'),

            Stat::make('Proyek Aktif', Project::where('is_active', true)->count())
                ->description('Tampil di frontend')
                ->descriptionIcon('heroicon-m-eye')
                ->color('success'),

            Stat::make('Proyek Selesai', Project::where('status', 'completed')->count())
                ->description('Status: completed')
                ->descriptionIcon('heroicon-m-check-badge')
                ->color('info'),

            Stat::make('Total Skill', Skill::count())
                ->description('Keahlian ditampilkan')
                ->descriptionIcon('heroicon-m-cpu-chip')
                ->color('primary'),

            Stat::make('Total Service', Service::count())
                ->description('Layanan ditawarkan')
                ->descriptionIcon('heroicon-m-squares-2x2')
                ->color('success'),

            Stat::make('Technology Stack', Technology::count())
                ->description('Teknologi digunakan')
                ->descriptionIcon('heroicon-m-code-bracket')
                ->color('gray'),

            Stat::make('Proyek Bulan Ini', Project::whereMonth('created_at', now()->month)->whereYear('created_at', now()->year)->count())
                ->description(now()->translatedFormat('F Y'))
                ->descriptionIcon('heroicon-m-calendar')
                ->color('warning'),
        ];
    }
}