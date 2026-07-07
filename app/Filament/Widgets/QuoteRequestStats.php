<?php

namespace App\Filament\Widgets;

use App\Models\QuoteRequest;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class QuoteRequestStats extends StatsOverviewWidget
{
    protected ?string $heading = 'Quote pipeline';

    protected ?string $description = 'A quick read on what needs attention, what is being assessed, and what has converted.';

    protected function getStats(): array
    {
        $total = QuoteRequest::query()->count();

        return [
            Stat::make('New quote requests', QuoteRequest::query()->where('status', 'new')->count())
                ->description('Needs first review')
                ->descriptionIcon(Heroicon::OutlinedBellAlert)
                ->icon(Heroicon::OutlinedInboxStack)
                ->chart([1, 3, 2, 4, 4, 6, 5])
                ->color('warning'),
            Stat::make('Reviewing', QuoteRequest::query()->where('status', 'reviewing')->count())
                ->description('Currently being assessed')
                ->descriptionIcon(Heroicon::OutlinedClipboardDocumentCheck)
                ->icon(Heroicon::OutlinedWrenchScrewdriver)
                ->chart([2, 2, 3, 5, 4, 6, 7])
                ->color('info'),
            Stat::make('Accepted / completed', QuoteRequest::query()->whereIn('status', ['accepted', 'completed'])->count())
                ->description('Won or fulfilled')
                ->descriptionIcon(Heroicon::OutlinedCheckCircle)
                ->icon(Heroicon::OutlinedSparkles)
                ->chart([1, 1, 2, 3, 5, 6, 8])
                ->color('success'),
            Stat::make('Total enquiries', $total)
                ->description('All time quote requests')
                ->descriptionIcon(Heroicon::OutlinedChartBar)
                ->icon(Heroicon::OutlinedCircleStack)
                ->chart([1, 2, 2, 3, 5, 8, max(1, $total)])
                ->color('gray'),
        ];
    }
}
