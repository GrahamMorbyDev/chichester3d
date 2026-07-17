<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::query()->updateOrCreate(
            ['email' => 'admin@chichester3dprinting.com'],
            [
                'name' => 'C3D Admin',
                'password' => Hash::make('bVJmTww7mxYZM3dKtRjN'),
            ],
        );

        Product::query()->updateOrCreate(
            ['slug' => 'gaming-case-bookends'],
            [
                'title' => 'Gaming Case Bookends',
                'short_description' => 'A tidy PLA bookend concept for keeping handheld game cases upright on a shelf or desk.',
                'description' => 'The first C3D original product direction: compact printed bookends for game case storage, designed without platform branding so the structure can flex into future variants.',
                'price' => 18.00,
                'stripe_payment_url' => null,
                'etsy_url' => null,
                'category' => 'Desk & Gaming',
                'material' => 'PLA',
                'colour_options' => ['Black' => 'Default', 'White' => 'Clean desk setup', 'Orange' => 'C3D accent'],
                'images' => ['products/example-main-placeholder.png', 'products/example-detail-placeholder.png'],
                'active' => true,
            ],
        );

        foreach ([
            ['sci-fi-barricade-pack', 'Sci-Fi Barricade Pack', 'Chunky PLA tabletop barricades for generic sci-fi skirmish boards and RPG encounters.', 'Tabletop Terrain'],
            ['dungeon-scatter-terrain', 'Dungeon Scatter Terrain', 'Small crates, barrels, doors and table pieces for fantasy campaign encounters.', 'Tabletop Terrain'],
            ['dice-tray-token-holder', 'Dice Tray & Token Holder', 'A practical PLA dice tray with space for gaming tokens and condition markers.', 'Gaming Accessories'],
            ['ruined-wall-sections', 'Ruined Wall Sections', 'Modular damaged wall sections for fantasy or sci-fi tabletop layouts.', 'Buildings & Ruins'],
            ['custom-objective-markers', 'Custom Objective Markers', 'Numbered or themed markers for local club games, campaigns and small events.', 'Custom Campaign Pieces'],
            ['miniature-display-plinths', 'Miniature Display Plinths', 'Simple display plinths and bases for painted tabletop models.', 'Miniature Bases & Displays'],
        ] as [$slug, $title, $shortDescription, $category]) {
            Product::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $title,
                    'short_description' => $shortDescription,
                    'description' => $shortDescription.' Request a quote for sizing, colour and fit requirements.',
                    'price' => null,
                    'stripe_payment_url' => null,
                    'etsy_url' => null,
                    'category' => $category,
                    'material' => 'PLA',
                    'colour_options' => ['Black' => 'Available', 'White' => 'Available', 'Custom' => 'Ask first'],
                    'images' => ['products/example-main-placeholder.png', 'products/example-detail-placeholder.png'],
                    'active' => true,
                ],
            );
        }
    }
}
