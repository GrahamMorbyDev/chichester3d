<?php

namespace App\Filament\Resources\Products\Tables;

use App\Models\Product;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class ProductsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('images')
                    ->label('Images')
                    ->disk('public')
                    ->square()
                    ->stacked()
                    ->limit(2)
                    ->limitedRemainingText()
                    ->size(48),
                TextColumn::make('title')
                    ->description(fn (Product $record): string => $record->short_description)
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->wrap(),
                TextColumn::make('category')
                    ->badge()
                    ->color('info')
                    ->sortable(),
                TextColumn::make('price')
                    ->money('GBP')
                    ->placeholder('Quote only')
                    ->sortable(),
                TextColumn::make('material')
                    ->badge()
                    ->color('gray')
                    ->toggleable(),
                IconColumn::make('active')
                    ->boolean(),
            ])
            ->filters([
                SelectFilter::make('category')->options(Product::CATEGORIES),
            ])
            ->emptyStateIcon(Heroicon::OutlinedShoppingBag)
            ->emptyStateHeading('No products yet')
            ->emptyStateDescription('Add simple product directions or quote-only examples for the future shop area.')
            ->recordActions([
                EditAction::make()
                    ->label('Open'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
