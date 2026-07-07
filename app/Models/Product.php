<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable([
    'title',
    'slug',
    'short_description',
    'description',
    'price',
    'category',
    'material',
    'colour_options',
    'images',
    'active',
])]
class Product extends Model
{
    public const CATEGORIES = [
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
}
