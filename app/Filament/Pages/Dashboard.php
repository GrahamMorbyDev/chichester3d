<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\LatestQuoteRequests;
use BackedEnum;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Schemas\Components\View;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;

class Dashboard extends BaseDashboard
{
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?string $navigationLabel = 'Studio overview';

    protected static ?string $title = 'Studio overview';

    public function getColumns(): int|array
    {
        return 1;
    }

    public function getWidgets(): array
    {
        return [
            LatestQuoteRequests::class,
        ];
    }

    public function content(Schema $schema): Schema
    {
        return $schema
            ->components([
                View::make('filament.dashboard.hero'),
                $this->getWidgetsContentComponent(),
            ]);
    }
}
