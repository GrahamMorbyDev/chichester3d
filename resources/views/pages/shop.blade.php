@extends('layouts.site')

@section('content')
    <section class="bg-[#061522] text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-12 sm:px-8 lg:grid-cols-[0.82fr_1.18fr] lg:items-center">
            <div>
                <img class="mb-8 w-full max-w-md" src="{{ asset('images/terrain-essentials-logo.png') }}" alt="C3D Terrain Essentials logo">
                <p class="mb-4 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">C3D Store</p>
                <h1 class="text-4xl font-black leading-tight sm:text-7xl">Tabletop terrain, accessories and useful printed products.</h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/70">Shop matte grey PLA terrain, sci-fi barricades, buildings, ruins, gaming accessories and practical printed products from C3D.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('terrain-essentials') }}" class="rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Terrain Essentials</a>
                    <a href="{{ route('quote') }}" class="rounded-lg border border-white/20 px-5 py-4 text-sm font-black text-white">Custom Order</a>
                </div>
            </div>
            <img class="aspect-[1.45] w-full rounded-lg object-cover shadow-2xl shadow-black/35" src="{{ asset('images/terrain-essentials-promo.png') }}" alt="Terrain Essentials tabletop terrain board with matte grey PLA sci-fi buildings and barricades">
        </div>
    </section>

    <section class="bg-[#061522] px-5 pb-14 pt-4 text-white sm:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mb-8 flex flex-wrap gap-2">
                @foreach ($productsByCategory->keys() as $category)
                    <a href="#{{ \Illuminate\Support\Str::slug($category) }}" class="rounded-lg border border-white/10 bg-white/5 px-3 py-2 text-sm font-black text-white/80 hover:border-c3d-teal hover:text-white">{{ $category }}</a>
                @endforeach
            </div>

            <div class="grid gap-12">
            @forelse ($productsByCategory as $category => $categoryProducts)
                <section id="{{ \Illuminate\Support\Str::slug($category) }}">
                    <div class="mb-5 flex flex-col gap-2 sm:flex-row sm:items-end sm:justify-between">
                        <div>
                            <p class="mb-2 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">{{ $category }}</p>
                            <h2 class="text-3xl font-black">{{ $categoryProducts->count() }} {{ \Illuminate\Support\Str::plural('product', $categoryProducts->count()) }}</h2>
                        </div>
                        <a href="{{ route('quote') }}" class="text-sm font-black text-c3d-orange">Ask about custom work</a>
                    </div>

                    <div class="grid gap-4 md:grid-cols-2 xl:grid-cols-3">
                        @foreach ($categoryProducts as $product)
                            @php($imageUrls = $product->imageUrls())
                            <article class="overflow-hidden rounded-lg border border-white/10 bg-white/[0.04] shadow-2xl shadow-black/10">
                                @if ($product->primaryImageUrl())
                                    <div class="bg-black/20 p-1">
                                        <img class="aspect-[1.35] h-full w-full rounded-md object-cover" src="{{ $imageUrls[0] }}" alt="{{ $product->title }} product image">
                                    </div>
                                @else
                                    <div class="grid aspect-[1.35] place-items-center bg-white/5 p-6 text-center text-sm font-bold text-white/55">
                                        Product images coming soon
                                    </div>
                                @endif

                                <div class="p-6">
                                    <span class="text-sm font-black text-c3d-orange">{{ $product->category }}</span>
                                    <h3 class="mt-4 text-2xl font-black">{{ $product->title }}</h3>
                                    <p class="mt-3 leading-7 text-white/65">{{ $product->short_description }}</p>
                                    <div class="mt-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                        <span class="font-black">{{ $product->price ? 'GBP '.$product->price : 'Quote' }}</span>
                                        <div class="flex flex-wrap gap-2 sm:justify-end">
                                            @if ($product->hasStripePaymentLink())
                                                <a href="{{ $product->stripe_payment_url }}" target="_blank" rel="noopener noreferrer" class="rounded-lg bg-c3d-teal px-4 py-2 text-sm font-black text-white">Buy Now</a>
                                            @endif

                                            @if ($product->hasEtsyUrl())
                                                <a href="{{ $product->etsy_url }}" target="_blank" rel="noopener noreferrer" class="rounded-lg border border-white/15 px-4 py-2 text-sm font-black text-white">Etsy</a>
                                            @endif

                                            @unless ($product->hasStripePaymentLink())
                                                <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-orange px-4 py-2 text-sm font-black text-c3d-ink">Enquire</a>
                                            @endunless
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @empty
                <p class="rounded-lg border border-white/10 bg-white/5 p-6 text-white/70">Products are being prepared. Custom enquiries are open now.</p>
            @endforelse
            </div>
        </div>
    </section>
@endsection
