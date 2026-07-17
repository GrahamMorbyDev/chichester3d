<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\Products\ProductResource;
use App\Models\Product;
use Filament\Support\Icons\Heroicon;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StoreStats extends StatsOverviewWidget
{
    protected ?string $heading = 'Store health';

    protected ?string $description = 'A quick check on whether Terrain Essentials products are ready to sell.';

    protected function getStats(): array
    {
        $activeProducts = Product::query()->where('active', true)->count();
        $draftProducts = Product::query()->where('active', false)->count();
        $stripeProducts = Product::query()
            ->where('active', true)
            ->whereNotNull('stripe_payment_url')
            ->where('stripe_payment_url', '!=', '')
            ->count();
        $productsMissingImages = Product::query()
            ->where('active', true)
            ->where(function ($query): void {
                $query
                    ->whereNull('images')
                    ->orWhereJsonLength('images', 0);
            })
            ->count();

        return [
            Stat::make('Active products', $activeProducts)
                ->description('Visible in the store')
                ->descriptionIcon(Heroicon::OutlinedShoppingBag)
                ->icon(Heroicon::OutlinedShoppingBag)
                ->url(ProductResource::getUrl())
                ->color('success'),
            Stat::make('Draft products', $draftProducts)
                ->description('Hidden until ready')
                ->descriptionIcon(Heroicon::OutlinedPencilSquare)
                ->icon(Heroicon::OutlinedArchiveBox)
                ->url(ProductResource::getUrl())
                ->color('gray'),
            Stat::make('Buy now ready', $stripeProducts)
                ->description('Active products with Stripe links')
                ->descriptionIcon(Heroicon::OutlinedCreditCard)
                ->icon(Heroicon::OutlinedCurrencyPound)
                ->url(ProductResource::getUrl())
                ->color('info'),
            Stat::make('Missing images', $productsMissingImages)
                ->description('Active products needing a main image')
                ->descriptionIcon(Heroicon::OutlinedPhoto)
                ->icon(Heroicon::OutlinedExclamationTriangle)
                ->url(ProductResource::getUrl())
                ->color($productsMissingImages > 0 ? 'warning' : 'success'),
        ];
    }
}
