@extends('layouts.site')

@section('content')
    <section class="bg-[#061522] px-5 py-12 text-white sm:px-8">
        <div class="mx-auto max-w-7xl">
            <a href="{{ route('shop') }}" class="text-sm font-black text-c3d-teal">Back to Store</a>
            <div class="mt-8 grid gap-10 lg:grid-cols-[1.08fr_0.92fr] lg:items-start">
                <div>
                    @if ($product->primaryImageUrl())
                        <img class="aspect-[1.18] w-full rounded-lg object-cover shadow-2xl shadow-black/35" src="{{ $imageUrls[0] }}" alt="{{ $product->title }} main product image">
                    @else
                        <div class="grid aspect-[1.18] place-items-center rounded-lg border border-white/10 bg-white/5 p-6 text-center text-sm font-bold text-white/60">
                            Product images coming soon
                        </div>
                    @endif

                    @if (count($imageUrls) > 1)
                        <div class="mt-3 grid grid-cols-2 gap-3 sm:grid-cols-3">
                            @foreach (array_slice($imageUrls, 1) as $imageUrl)
                                <img class="aspect-[1.2] rounded-lg object-cover" src="{{ $imageUrl }}" alt="{{ $product->title }} detail image {{ $loop->iteration }}">
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="rounded-lg border border-white/10 bg-white/[0.04] p-6 shadow-2xl shadow-black/10 sm:p-8">
                    <p class="mb-4 text-xs font-black uppercase tracking-[0.1em] text-c3d-orange">{{ $product->category }}</p>
                    <h1 class="text-4xl font-black leading-tight sm:text-6xl">{{ $product->title }}</h1>
                    <p class="mt-6 text-lg leading-8 text-white/70">{{ $product->description }}</p>

                    <dl class="mt-8 grid gap-3 sm:grid-cols-2">
                        <div class="rounded-lg bg-white/5 p-4">
                            <dt class="text-xs font-black uppercase tracking-[0.08em] text-white/45">Price</dt>
                            <dd class="mt-2 text-2xl font-black">{{ $product->price ? 'GBP '.$product->price : 'Quote' }}</dd>
                        </div>
                        <div class="rounded-lg bg-white/5 p-4">
                            <dt class="text-xs font-black uppercase tracking-[0.08em] text-white/45">Material</dt>
                            <dd class="mt-2 text-2xl font-black">{{ $product->material ?: 'PLA' }}</dd>
                        </div>
                    </dl>

                    <div class="mt-8 flex flex-wrap gap-3">
                        @if ($product->hasStripePaymentLink())
                            <a href="{{ $product->stripe_payment_url }}" target="_blank" rel="noopener noreferrer" class="rounded-lg bg-c3d-teal px-5 py-4 text-sm font-black text-white">Buy Now</a>
                        @endif

                        @if ($product->hasEtsyUrl())
                            <a href="{{ $product->etsy_url }}" target="_blank" rel="noopener noreferrer" class="rounded-lg border border-white/15 px-5 py-4 text-sm font-black text-white">View on Etsy</a>
                        @endif

                        <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Ask a Question</a>
                    </div>

                    <div class="mt-8 border-t border-white/10 pt-6 text-sm leading-7 text-white/60">
                        <p>Supplied unpainted unless stated otherwise. Miniatures, scenery mats and painted example props are not included unless the product listing says so.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
