<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Products\ProductResource;
use App\Models\Product;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;
use Illuminate\Database\Eloquent\Builder;

class LatestProducts extends TableWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getTableHeading(): string
    {
        return 'Latest products';
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(fn (): Builder => Product::query()->latest())
            ->columns([
                ImageColumn::make('images')
                    ->label('Image')
                    ->disk('public')
                    ->square()
                    ->stacked()
                    ->limit(1)
                    ->size(56),
                TextColumn::make('title')
                    ->description(fn (Product $record): string => $record->category)
                    ->searchable()
                    ->weight('bold')
                    ->wrap(),
                TextColumn::make('price')
                    ->money('GBP')
                    ->placeholder('Quote')
                    ->sortable(),
                TextColumn::make('material')
                    ->badge()
                    ->color('gray')
                    ->placeholder('PLA'),
                IconColumn::make('stripe_payment_url')
                    ->label('Stripe')
                    ->boolean()
                    ->state(fn (Product $record): bool => $record->hasStripePaymentLink()),
                IconColumn::make('active')
                    ->label('Live')
                    ->boolean(),
            ])
            ->recordUrl(fn (Product $record): string => ProductResource::getUrl('edit', ['record' => $record]))
            ->paginated(false)
            ->emptyStateIcon(Heroicon::OutlinedShoppingBag)
            ->emptyStateHeading('No products yet')
            ->emptyStateDescription('Add Terrain Essentials products here once you have photos, copy and payment links ready.');
    }
}
