<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\QuoteRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Middleware\ThrottleRequests;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutMiddleware(ThrottleRequests::class);
    }

    public function test_homepage_returns_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<link rel="manifest"', false);
        $response->assertSee('<link rel="sitemap" type="application/xml"', false);
        $response->assertSee('<meta name="geo.placename" content="Chichester">', false);
        $response->assertSee('<meta name="description"', false);
        $response->assertSee('max-image-preview:large', false);
        $response->assertSee('<meta property="og:title"', false);
        $response->assertSee('<meta property="og:image:alt"', false);
        $response->assertSee('<script type="application/ld+json">', false);
        $response->assertSee(route('sussex-prototyping'), false);
        $response->assertSee(route('beginners'), false);
    }

    public function test_sitemap_exposes_public_pages_and_images(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertHeader('content-type', 'application/xml; charset=UTF-8');
        $response->assertSee('<urlset', false);
        $response->assertSee(route('home'), false);
        $response->assertSee(route('services'), false);
        $response->assertSee(route('print-file'), false);
        $response->assertSee(route('small-batch'), false);
        $response->assertSee(route('sussex-prototyping'), false);
        $response->assertSee(route('beginners'), false);
        $response->assertSee(route('tabletop-miniatures'), false);
        $response->assertSee(route('terrain-essentials'), false);
        $response->assertSee(route('about'), false);
        $response->assertSee(route('quote'), false);
        $response->assertSee('<image:image>', false);
        $response->assertDontSee('/admin', false);
        $response->assertDontSee('/request-a-quote/success', false);
    }

    public function test_local_seo_landing_pages_return_useful_content(): void
    {
        $this->get(route('sussex-prototyping'))
            ->assertOk()
            ->assertSee('3D Printing &amp; Prototyping Sussex', false)
            ->assertSee('Local prototype prints', false)
            ->assertSee('Chichester, Sussex and nearby Hampshire', false);

        $this->get(route('beginners'))
            ->assertOk()
            ->assertSee('3D Printing Help for Beginners in Chichester', false)
            ->assertSee('not currently a formal 3D printing course or club', false)
            ->assertSee('Send what you have', false);

        $this->get(route('tabletop-miniatures'))
            ->assertOk()
            ->assertSee('Custom Tabletop Miniatures &amp; Terrain Chichester', false)
            ->assertSee('terrain, dungeon tiles, bases, objective markers, tokens', false)
            ->assertSee('ultra-fine display miniatures, resin is often the better process', false);

        $this->get(route('terrain-essentials'))
            ->assertOk()
            ->assertSee('Terrain Essentials | 3D Printed Tabletop Terrain &amp; Buildings', false)
            ->assertSee('Sold through the C3D store and Etsy', false)
            ->assertSee('matte grey PLA', false)
            ->assertSee('commercially compostable under the right industrial conditions', false)
            ->assertSee('not affiliated with, endorsed by or sponsored by', false);
    }

    public function test_robots_points_crawlers_to_the_sitemap_and_blocks_private_paths(): void
    {
        $response = $this->get('/robots.txt');

        $response->assertOk();
        $response->assertHeader('content-type', 'text/plain; charset=UTF-8');
        $response->assertSee('User-agent: *', false);
        $response->assertSee('Disallow: /admin', false);
        $response->assertSee('Disallow: /request-a-quote/success/', false);
        $response->assertSee('Sitemap: '.url('/sitemap.xml'), false);
    }

    public function test_site_manifest_contains_c3d_app_metadata(): void
    {
        $response = $this->get('/site.webmanifest');

        $response->assertOk();
        $response->assertHeader('content-type', 'application/manifest+json; charset=UTF-8');
        $response->assertJsonPath('name', 'Chichester 3D Printing.com');
        $response->assertJsonPath('short_name', 'C3D');
        $response->assertJsonPath('theme_color', '#17212b');
    }

    public function test_shop_groups_products_by_category_and_shows_product_listing_image(): void
    {
        Product::query()->create([
            'title' => 'Sci-Fi Barricade Pack',
            'slug' => 'sci-fi-barricade-pack',
            'short_description' => 'Chunky PLA barricades for tabletop games.',
            'description' => '<p>A printed terrain pack with multiple wall angles.</p><p>Supplied unpainted and ready to prime.</p>',
            'price' => 24.00,
            'stripe_payment_url' => 'https://buy.stripe.com/test_barricade',
            'etsy_url' => 'https://www.etsy.com/uk/listing/123456789/sci-fi-barricade-pack',
            'category' => 'Tabletop Terrain',
            'material' => 'PLA',
            'colour_options' => ['Grey' => 'Primer style'],
            'images' => ['products/barricade-main.jpg'],
            'active' => true,
        ]);

        $response = $this->get(route('shop'));

        $response->assertOk();
        $response->assertSee('Tabletop Terrain', false);
        $response->assertSee('Sci-Fi Barricade Pack', false);
        $response->assertSee('products/barricade-main.jpg', false);
        $response->assertSee(route('product', 'sci-fi-barricade-pack'), false);
        $response->assertSee('View Product', false);
        $response->assertDontSee('https://buy.stripe.com/test_barricade', false);
    }

    public function test_product_page_contains_buy_now_and_etsy_links(): void
    {
        $product = Product::query()->create([
            'title' => 'Sci-Fi Barricade Pack',
            'slug' => 'sci-fi-barricade-pack',
            'short_description' => 'Chunky PLA barricades for tabletop games.',
            'description' => '<p>A printed terrain pack with multiple wall angles.</p><p>Supplied unpainted and ready to prime.</p>',
            'price' => 24.00,
            'stripe_payment_url' => 'https://buy.stripe.com/test_barricade',
            'etsy_url' => 'https://www.etsy.com/uk/listing/123456789/sci-fi-barricade-pack',
            'category' => 'Tabletop Terrain',
            'material' => 'PLA',
            'colour_options' => ['Grey' => 'Primer style'],
            'images' => ['products/barricade-main.jpg'],
            'active' => true,
        ]);

        $response = $this->get(route('product', $product));

        $response->assertOk();
        $response->assertSee('Buy Now', false);
        $response->assertSee('<p>A printed terrain pack with multiple wall angles.</p>', false);
        $response->assertSee('<p>Supplied unpainted and ready to prime.</p>', false);
        $response->assertSee('https://buy.stripe.com/test_barricade', false);
        $response->assertSee('View on Etsy', false);
        $response->assertSee('https://www.etsy.com/uk/listing/123456789/sci-fi-barricade-pack', false);
    }

    public function test_quote_request_can_be_submitted_with_an_upload(): void
    {
        Storage::fake('local');

        $response = $this->post(route('quote.store'), [
            'name' => 'Alex Maker',
            'email' => 'alex@example.com',
            'quote_started_at' => now()->subSeconds(10)->timestamp,
            'phone' => '01243 000000',
            'postcode' => 'PO19',
            'service_type' => 'print_file',
            'project_type' => 'replacement_part',
            'description' => 'I need a small replacement plastic bracket printed from this STL file for a workshop repair.',
            'quantity' => 3,
            'material_preference' => 'PLA',
            'colour_preference' => 'Black',
            'measurements' => 'Approx 40mm by 20mm, fit is more important than finish.',
            'uploads' => [
                UploadedFile::fake()->create('replacement-bracket.stl', 24, 'model/stl'),
            ],
        ]);

        $quoteRequest = QuoteRequest::query()->firstOrFail();

        $response->assertRedirect(route('quote.success', $quoteRequest));
        $this->assertSame('new', $quoteRequest->status);
        $this->assertSame(1, $quoteRequest->files()->count());
        Storage::disk('local')->assertExists($quoteRequest->files()->first()->path);
    }

    public function test_quote_request_validation_requires_core_fields(): void
    {
        $response = $this->from(route('quote'))->post(route('quote.store'), [
            'name' => '',
            'email' => 'not-an-email',
            'quote_started_at' => now()->subSeconds(10)->timestamp,
            'service_type' => 'bulk_factory',
            'description' => 'Too short',
            'quantity' => 0,
        ]);

        $response->assertRedirect(route('quote'));
        $response->assertSessionHasErrors(['name', 'email', 'service_type', 'description', 'quantity']);
        $this->assertDatabaseCount('quote_requests', 0);
    }

    public function test_quote_request_rejects_honeypot_spam(): void
    {
        $response = $this->from(route('quote'))->post(route('quote.store'), [
            ...$this->validQuotePayload(),
            'website' => 'https://spam.example',
        ]);

        $response->assertRedirect(route('quote'));
        $response->assertSessionHasErrors(['website']);
        $this->assertDatabaseCount('quote_requests', 0);
    }

    public function test_quote_request_rejects_marketing_spam_content(): void
    {
        $response = $this->from(route('quote'))->post(route('quote.store'), [
            ...$this->validQuotePayload(),
            'description' => 'Hello, we recently ran a backend analysis of your website and can improve your search engine optimization, online visibility, Google, Bing rankings, and arrange a quick phone call.',
        ]);

        $response->assertRedirect(route('quote'));
        $response->assertSessionHasErrors(['description']);
        $this->assertDatabaseCount('quote_requests', 0);
    }

    public function test_quote_request_rejects_submissions_that_arrive_too_fast(): void
    {
        $response = $this->from(route('quote'))->post(route('quote.store'), [
            ...$this->validQuotePayload(),
            'quote_started_at' => now()->timestamp,
        ]);

        $response->assertRedirect(route('quote'));
        $response->assertSessionHasErrors(['description']);
        $this->assertDatabaseCount('quote_requests', 0);
    }

    /**
     * @return array<string, mixed>
     */
    private function validQuotePayload(): array
    {
        return [
            'name' => 'Alex Maker',
            'email' => 'alex@example.com',
            'quote_started_at' => now()->subSeconds(10)->timestamp,
            'service_type' => 'print_file',
            'project_type' => 'replacement_part',
            'description' => 'I need a small replacement plastic bracket printed from an STL file for a workshop repair.',
            'quantity' => 3,
            'material_preference' => 'PLA',
            'colour_preference' => 'Black',
            'measurements' => 'Approx 40mm by 20mm, fit is more important than finish.',
        ];
    }
}
