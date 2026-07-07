@php
    $newQuotes = \App\Models\QuoteRequest::query()->where('status', 'new')->count();
    $reviewingQuotes = \App\Models\QuoteRequest::query()->where('status', 'reviewing')->count();
    $completedQuotes = \App\Models\QuoteRequest::query()->whereIn('status', ['accepted', 'completed'])->count();
    $activeProducts = \App\Models\Product::query()->where('active', true)->count();
@endphp

<section class="c3d-admin-hero" aria-label="Admin overview">
    <div class="c3d-admin-hero__inner">
        <div>
            <div class="c3d-admin-eyebrow">C3D Studio</div>
            <h2>Today’s admin snapshot.</h2>
            <p>
                Keep quote requests moving and product examples tidy without digging through the site.
            </p>
        </div>
        <div class="c3d-admin-metrics">
            <a class="c3d-admin-metric" href="{{ \App\Filament\Resources\QuoteRequests\QuoteRequestResource::getUrl() }}">
                <span>{{ $newQuotes }}</span>
                <strong>New quotes</strong>
            </a>
            <a class="c3d-admin-metric" href="{{ \App\Filament\Resources\QuoteRequests\QuoteRequestResource::getUrl() }}">
                <span>{{ $reviewingQuotes }}</span>
                <strong>Reviewing</strong>
            </a>
            <a class="c3d-admin-metric" href="{{ \App\Filament\Resources\QuoteRequests\QuoteRequestResource::getUrl() }}">
                <span>{{ $completedQuotes }}</span>
                <strong>Won / done</strong>
            </a>
            <a class="c3d-admin-metric" href="{{ \App\Filament\Resources\Products\ProductResource::getUrl() }}">
                <span>{{ $activeProducts }}</span>
                <strong>Active products</strong>
            </a>
        </div>
    </div>
</section>
