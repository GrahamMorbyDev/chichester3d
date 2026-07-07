<?php

namespace App\Filament\Widgets;

use App\Models\QuoteRequest;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class QuoteRequestStats extends StatsOverviewWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('New quote requests', QuoteRequest::query()->where('status', 'new')->count())
                ->description('Needs first review')
                ->color('warning'),
            Stat::make('Reviewing', QuoteRequest::query()->where('status', 'reviewing')->count())
                ->description('Currently being assessed')
                ->color('info'),
            Stat::make('Accepted / completed', QuoteRequest::query()->whereIn('status', ['accepted', 'completed'])->count())
                ->description('Won or fulfilled')
                ->color('success'),
        ];
    }
}
