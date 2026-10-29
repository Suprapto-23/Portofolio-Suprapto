<?php

namespace App\Filament\Widgets;

use App\Models\Project;
use Filament\Widgets\ChartWidget;

class ProjectsChart extends ChartWidget
{
    protected ?string $heading = 'Distribusi Proyek per Kategori';

    protected function getData(): array
    {
        $data = Project::query()
            ->selectRaw('category, count(*) as total')
            ->whereNotNull('category')
            ->groupBy('category')
            ->pluck('total', 'category');

        return [
            'datasets' => [
                [
                    'label' => 'Jumlah Proyek',
                    'data' => array_values($data->toArray()),
                    'backgroundColor' => [
                        '#0A6CFF', '#25AEFF', '#7048FF', '#5F4FEE', '#3D66F5', '#1677FF',
                    ],
                    'borderRadius' => 8,
                ],
            ],
            'labels' => array_keys($data->toArray()),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}