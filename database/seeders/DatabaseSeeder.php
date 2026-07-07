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
        User::factory()->create([
            'name' => 'C3D Admin',
            'email' => 'admin@chichester3dprinting.com',
            'password' => Hash::make('password'),
        ]);

        Product::query()->updateOrCreate(
            ['slug' => 'gaming-case-bookends'],
            [
                'title' => 'Gaming Case Bookends',
                'short_description' => 'A tidy PLA bookend concept for keeping handheld game cases upright on a shelf or desk.',
                'description' => 'The first C3D original product direction: compact printed bookends for game case storage, designed without platform branding so the structure can flex into future variants.',
                'price' => 18.00,
                'category' => 'Desk & Gaming',
                'material' => 'PLA',
                'colour_options' => ['Black' => 'Default', 'White' => 'Clean desk setup', 'Orange' => 'C3D accent'],
                'images' => [],
                'active' => true,
            ],
        );

        foreach ([
            ['desk-cable-clips', 'Desk Cable Clips', 'Small PLA clips for tidying charger, USB and controller cables.', 'Home Organisation'],
            ['pond-sensor-mount', 'Pond Sensor Mount', 'Customisable PLA mount direction for lightweight pond and garden sensor positioning.', 'Garden & Pond'],
            ['prototype-bracket-sample', 'Prototype Bracket Sample', 'Example bracket listing for small batch and replacement part enquiries.', 'Custom Parts'],
        ] as [$slug, $title, $shortDescription, $category]) {
            Product::query()->updateOrCreate(
                ['slug' => $slug],
                [
                    'title' => $title,
                    'short_description' => $shortDescription,
                    'description' => $shortDescription.' Request a quote for sizing, colour and fit requirements.',
                    'price' => null,
                    'category' => $category,
                    'material' => 'PLA',
                    'colour_options' => ['Black' => 'Available', 'White' => 'Available', 'Custom' => 'Ask first'],
                    'images' => [],
                    'active' => true,
                ],
            );
        }
    }
}
