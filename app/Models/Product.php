<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

#[Fillable([
    'title',
    'slug',
    'short_description',
    'description',
    'price',
    'stripe_payment_url',
    'etsy_url',
    'category',
    'material',
    'colour_options',
    'images',
    'active',
])]
class Product extends Model
{
    public const CATEGORIES = [
        'Tabletop Terrain' => 'Tabletop Terrain',
        'Gaming Accessories' => 'Gaming Accessories',
        'Buildings & Ruins' => 'Buildings & Ruins',
        'Custom Campaign Pieces' => 'Custom Campaign Pieces',
        'Miniature Bases & Displays' => 'Miniature Bases & Displays',
        'Desk & Gaming' => 'Desk & Gaming',
        'Home Organisation' => 'Home Organisation',
        'Garden & Pond' => 'Garden & Pond',
        'Custom Parts' => 'Custom Parts',
        'Hobby Prints' => 'Hobby Prints',
    ];

    protected function casts(): array
    {
        return [
            'colour_options' => 'array',
            'images' => 'array',
            'active' => 'boolean',
            'price' => 'decimal:2',
        ];
    }

    /**
     * @return array<int, string>
     */
    public function imageUrls(): array
    {
        return collect($this->images ?? [])
            ->filter()
            ->values()
            ->map(fn (string $path): string => str_starts_with($path, 'http') || str_starts_with($path, '/')
                ? $path
                : Storage::disk('public')->url($path))
            ->all();
    }

    public function primaryImageUrl(): ?string
    {
        return $this->imageUrls()[0] ?? null;
    }

    public function hasStripePaymentLink(): bool
    {
        return filled($this->stripe_payment_url);
    }

    public function hasEtsyUrl(): bool
    {
        return filled($this->etsy_url);
    }
}
