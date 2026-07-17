@extends('layouts.site')

@section('content')
    <section class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
        <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">C3D Store</p>
        <h1 class="max-w-4xl text-4xl font-black leading-tight sm:text-7xl">Tabletop terrain, accessories and useful printed products.</h1>
        <p class="mt-6 max-w-3xl text-lg leading-8 text-c3d-muted">Starting with PLA tabletop terrain and gaming accessories, then expanding into buildings, ruins, hobby storage and practical printed parts.</p>

        <div class="mt-8 flex flex-wrap gap-2">
            @foreach ($productsByCategory->keys() as $category)
                <a href="#{{ \Illuminate\Support\Str::slug($category) }}" class="rounded-lg border border-c3d-ink/10 bg-white px-3 py-2 text-sm font-black text-c3d-ink hover:border-c3d-teal hover:text-c3d-teal">{{ $category }}</a>
            @endforeach
        </div>

        <div class="mt-12 grid gap-12">
            @forelse ($productsByCategory as $category => $categoryProducts)
                <section id="{{ \Illuminate\Support\Str::slug($category) }}">
                    <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="mb-2 text-xs font-black uppercase tracking-[0.08em] text-c3d-orange">{{ $category }}</p>
                            <h2 class="text-3xl font-black">{{ $categoryProducts->count() }} {{ \Illuminate\Support\Str::plural('product', $categoryProducts->count()) }}</h2>
                        </div>
                        <a href="{{ route('quote') }}" class="text-sm font-black text-c3d-teal">Ask about custom work</a>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        @foreach ($categoryProducts as $product)
                            @php($imageUrls = $product->imageUrls())
                            <article class="overflow-hidden rounded-lg border border-c3d-ink/10 bg-white">
                                @if ($product->primaryImageUrl())
                                    <div class="grid aspect-[1.35] grid-cols-[1fr_0.42fr] gap-1 bg-c3d-paper p-1">
                                        <img class="h-full w-full rounded-md object-cover" src="{{ $imageUrls[0] }}" alt="{{ $product->title }} main product image">
                                        <div class="grid gap-1">
                                            @foreach (array_slice($imageUrls, 1, 2) as $imageUrl)
                                                <img class="h-full min-h-0 w-full rounded-md object-cover" src="{{ $imageUrl }}" alt="{{ $product->title }} secondary product image {{ $loop->iteration }}">
                                            @endforeach
                                        </div>
                                    </div>
                                @else
                                    <div class="grid aspect-[1.35] place-items-center bg-c3d-paper p-6 text-center text-sm font-bold text-c3d-muted">
                                        Product images coming soon
                                    </div>
                                @endif

                                <div class="p-6">
                                    <span class="text-sm font-black text-c3d-orange">{{ $product->category }}</span>
                                    <h3 class="mt-4 text-2xl font-black">{{ $product->title }}</h3>
                                    <p class="mt-3 leading-7 text-c3d-muted">{{ $product->short_description }}</p>
                                    <div class="mt-5 flex items-center justify-between gap-4">
                                        <span class="font-black">{{ $product->price ? 'GBP '.$product->price : 'Quote' }}</span>
                                        <div class="flex flex-wrap justify-end gap-2">
                                            @if ($product->hasStripePaymentLink())
                                                <a href="{{ $product->stripe_payment_url }}" target="_blank" rel="noopener noreferrer" class="rounded-lg bg-c3d-teal px-4 py-2 text-sm font-black text-white">Buy Now</a>
                                            @endif

                                            @if ($product->hasEtsyUrl())
                                                <a href="{{ $product->etsy_url }}" target="_blank" rel="noopener noreferrer" class="rounded-lg border border-c3d-ink/15 px-4 py-2 text-sm font-black text-c3d-ink">Etsy</a>
                                            @endif

                                            @unless ($product->hasStripePaymentLink())
                                                <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-ink px-4 py-2 text-sm font-black text-white">Enquire</a>
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @empty
                <p class="rounded-lg border border-c3d-ink/10 bg-white p-6 text-c3d-muted">Products are being prepared. Custom enquiries are open now.</p>
            @endforelse
        </div>
    </section>
@endsection
