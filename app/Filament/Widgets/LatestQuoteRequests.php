<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\QuoteRequests\QuoteRequestResource;
use App\Models\QuoteRequest;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestQuoteRequests extends TableWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getTableHeading(): string
    {
        return 'Latest quote requests';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => QuoteRequest::query()->latest())
            ->columns([
                TextColumn::make('created_at')
                    ->label('Received')
                    ->since()
                    ->sortable(),
                TextColumn::make('name')
                    ->description(fn (QuoteRequest $record): ?string => $record->postcode)
                    ->searchable()
                    ->weight('bold'),
                TextColumn::make('service_type')
                    ->label('Service')
                    ->formatStateUsing(fn (string $state): string => QuoteRequest::SERVICE_TYPES[$state] ?? $state)
                    ->badge()
                    ->color('info'),
                TextColumn::make('quantity')
                    ->label('Qty')
                    ->sortable(),
                TextColumn::make('status')
                    ->formatStateUsing(fn (string $state): string => QuoteRequest::STATUSES[$state] ?? $state)
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'new' => 'warning',
                        'accepted', 'completed' => 'success',
                        'rejected' => 'danger',
                        default => 'info',
                    }),
            ])
            ->recordUrl(fn (QuoteRequest $record): string => QuoteRequestResource::getUrl('edit', ['record' => $record]))
            ->paginated(false)
            ->emptyStateIcon(Heroicon::OutlinedInbox)
            ->emptyStateHeading('No quote requests yet')
            ->emptyStateDescription('New website enquiries will appear here as soon as customers submit the quote form.');
    }
}
