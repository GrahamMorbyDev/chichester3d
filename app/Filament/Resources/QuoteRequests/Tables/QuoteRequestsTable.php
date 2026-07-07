<?php

namespace App\Filament\Resources\QuoteRequests\Tables;

use App\Models\QuoteRequest;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class QuoteRequestsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')
                    ->label('Received')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('service_type')
                    ->formatStateUsing(fn (string $state): string => QuoteRequest::SERVICE_TYPES[$state] ?? $state)
                    ->badge(),
                TextColumn::make('quantity')
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
            ->filters([
                SelectFilter::make('service_type')->options(QuoteRequest::SERVICE_TYPES),
                SelectFilter::make('status')->options(QuoteRequest::STATUSES),
            ])
            ->defaultSort('created_at', 'desc')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
