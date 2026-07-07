<?php

namespace App\Filament\Resources\Products\Schemas;

use App\Models\Product;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\Str;

class ProductForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Product')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('title')
                                ->required()
                                ->maxLength(160)
                                ->live(onBlur: true)
                                ->afterStateUpdated(fn ($state, callable $set) => $set('slug', Str::slug($state))),
                            TextInput::make('slug')
                                ->required()
                                ->unique(ignoreRecord: true)
                                ->maxLength(180),
                            Select::make('category')
                                ->options(Product::CATEGORIES)
                                ->required(),
                            TextInput::make('price')
                                ->numeric()
                                ->prefix('GBP'),
                            TextInput::make('material')
                                ->placeholder('PLA')
                                ->maxLength(120),
                            Toggle::make('active')
                                ->default(true),
                        ]),
                        TextInput::make('short_description')
                            ->required()
                            ->maxLength(220)
                            ->columnSpanFull(),
                        Textarea::make('description')
                            ->required()
                            ->rows(5)
                            ->columnSpanFull(),
                        KeyValue::make('colour_options')
                            ->keyLabel('Colour')
                            ->valueLabel('Notes')
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
