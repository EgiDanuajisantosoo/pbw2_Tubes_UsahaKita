<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Perusahaan;

class StatsDashboard extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Perusahaan Yang Bergabung', Perusahaan::where('status','terverifikasi')->count())
            ->description(''),
            // ->color('success')
            // ->chart([7,3,4,5,6,3]),
            Stat::make('Perusahaan Menunggu Verifikasi', Perusahaan::where('status','pendding')->count()),
            Stat::make('Perusahaan Ditolak', Perusahaan::where('status','ditolak')->count()),
        ];
    }
}
