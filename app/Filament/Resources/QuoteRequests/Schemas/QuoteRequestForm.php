<?php

namespace App\Filament\Resources\QuoteRequests\Schemas;

use App\Models\QuoteRequest;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Illuminate\Support\HtmlString;

class QuoteRequestForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Customer')
                    ->schema([
                        Grid::make(2)->schema([
                            TextInput::make('name')->required()->maxLength(120),
                            TextInput::make('email')->email()->required()->maxLength(180),
                            TextInput::make('phone')->maxLength(60),
                            TextInput::make('postcode')->maxLength(20),
                        ]),
                    ]),
                Section::make('Request')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('service_type')
                                ->options(QuoteRequest::SERVICE_TYPES)
                                ->required(),
                            Select::make('project_type')
                                ->options(QuoteRequest::PROJECT_TYPES),
                            TextInput::make('quantity')
                                ->numeric()
                                ->minValue(1)
                                ->maxValue(100)
                                ->required(),
                        ]),
                        Textarea::make('description')
                            ->rows(5)
                            ->required()
                            ->columnSpanFull(),
                        Grid::make(2)->schema([
                            TextInput::make('material_preference')->maxLength(80),
                            TextInput::make('colour_preference')->maxLength(120),
                            TextInput::make('deadline')->maxLength(120),
                            TextInput::make('budget')->maxLength(120),
                        ]),
                        Textarea::make('measurements')
                            ->rows(3)
                            ->columnSpanFull(),
                    ]),
                Section::make('Admin')
                    ->schema([
                        Select::make('status')
                            ->options(QuoteRequest::STATUSES)
                            ->required(),
                        Textarea::make('internal_notes')
                            ->rows(5)
                            ->columnSpanFull(),
                        Placeholder::make('uploaded_files')
                            ->label('Uploaded files')
                            ->content(function (?QuoteRequest $record): HtmlString {
                                if (! $record?->exists || $record->files->isEmpty()) {
                                    return new HtmlString('<span class="text-sm text-gray-500">No files uploaded.</span>');
                                }

                                $links = $record->files->map(function ($file): string {
                                    $url = route('admin.quote-files.download', $file);
                                    $size = number_format($file->size / 1024, 1);

                                    return sprintf(
                                        '<li><a class="text-primary-600 underline" href="%s">%s</a> <span class="text-xs text-gray-500">(%s KB)</span></li>',
                                        e($url),
                                        e($file->original_filename),
                                        e($size),
                                    );
                                })->implode('');

                                return new HtmlString('<ul class="space-y-1">'.$links.'</ul>');
                            })
                            ->columnSpanFull(),
                    ]),
            ]);
    }
}
