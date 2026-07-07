<?php

namespace Tests\Feature;

use App\Models\QuoteRequest;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage_returns_successfully(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<meta name="description"', false);
        $response->assertSee('<meta property="og:title"', false);
        $response->assertSee('<script type="application/ld+json">', false);
    }

    public function test_quote_request_can_be_submitted_with_an_upload(): void
    {
        Storage::fake('local');

        $response = $this->post(route('quote.store'), [
            'name' => 'Alex Maker',
            'email' => 'alex@example.com',
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
            'service_type' => 'bulk_factory',
            'description' => 'Too short',
            'quantity' => 0,
        ]);

        $response->assertRedirect(route('quote'));
        $response->assertSessionHasErrors(['name', 'email', 'service_type', 'description', 'quantity']);
        $this->assertDatabaseCount('quote_requests', 0);
    }
}
