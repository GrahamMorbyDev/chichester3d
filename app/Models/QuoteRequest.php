<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable([
    'name',
    'email',
    'phone',
    'postcode',
    'service_type',
    'project_type',
    'description',
    'quantity',
    'material_preference',
    'colour_preference',
    'measurements',
    'deadline',
    'budget',
    'status',
    'internal_notes',
])]
class QuoteRequest extends Model
{
    public const SERVICE_TYPES = [
        'print_file' => 'Print My File',
        'design_print' => 'Design & Print',
        'small_batch' => 'Small Batch Runs',
        'shop_query' => 'Shop query',
        'other' => 'Other',
    ];

    public const PROJECT_TYPES = [
        'replacement_part' => 'Replacement part',
        'prototype' => 'Prototype',
        'hobby' => 'Hobby item',
        'business' => 'Business part',
        'home_garden' => 'Home / garden',
        'sensor_housing' => 'Sensor housing',
        'bracket_mount' => 'Bracket / mount',
        'other' => 'Other',
    ];

    public const STATUSES = [
        'new' => 'New',
        'reviewing' => 'Reviewing',
        'quoted' => 'Quoted',
        'accepted' => 'Accepted',
        'rejected' => 'Rejected',
        'completed' => 'Completed',
    ];

    public function files(): HasMany
    {
        return $this->hasMany(QuoteRequestFile::class);
    }
}
