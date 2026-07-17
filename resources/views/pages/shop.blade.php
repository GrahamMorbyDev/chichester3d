@extends('layouts.site')

@section('content')
    <section class="relative isolate min-h-[calc(100vh-74px)] overflow-hidden bg-[#061522] text-white">
        <img class="absolute inset-0 -z-20 h-full w-full object-cover" src="{{ asset('images/terrain-essentials-missile-silo-terrain.png') }}" alt="Terrain Essentials sci-fi missile silo tabletop terrain scene">
        <div class="absolute inset-0 -z-10 bg-[linear-gradient(90deg,rgba(6,21,34,0.98)_0%,rgba(6,21,34,0.88)_34%,rgba(6,21,34,0.46)_68%,rgba(6,21,34,0.72)_100%)]"></div>
        <div class="absolute inset-x-0 bottom-0 -z-10 h-40 bg-gradient-to-t from-[#061522] to-transparent"></div>

        <div class="mx-auto flex min-h-[calc(100vh-74px)] max-w-7xl items-center px-5 py-12 sm:px-8">
            <div class="max-w-3xl">
                <img class="mb-8 w-full max-w-xl" src="{{ asset('images/terrain-essentials-logo.png') }}" alt="C3D Terrain Essentials logo">
                <p class="mb-4 text-xs font-black uppercase tracking-[0.1em] text-c3d-teal">C3D Store | Matte Grey PLA Terrain</p>
                <h1 class="text-4xl font-black leading-[0.98] sm:text-7xl">Build better battlefields.</h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/78">Shop cinematic sci-fi terrain, missile silo scenery, industrial pipework, buildings, ruins and gaming accessories printed in paint-ready matte grey PLA.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="#products" class="rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Shop Products</a>
                    <a href="{{ route('terrain-essentials') }}" class="rounded-lg border border-white/25 bg-white/5 px-5 py-4 text-sm font-black text-white backdrop-blur">About Terrain Essentials</a>
                </div>
                <dl class="mt-8 grid gap-3 sm:grid-cols-3">
                    <div class="border-l-2 border-c3d-teal pl-4">
                        <dt class="text-2xl font-black">PLA</dt>
                        <dd class="mt-1 text-sm text-white/65">Matte grey, ready to paint</dd>
                    </div>
                    <div class="border-l-2 border-c3d-orange pl-4">
                        <dt class="text-2xl font-black">28-32mm</dt>
                        <dd class="mt-1 text-sm text-white/65">Built for tabletop scale</dd>
                    </div>
                    <div class="border-l-2 border-white/35 pl-4">
                        <dt class="text-2xl font-black">C3D + Etsy</dt>
                        <dd class="mt-1 text-sm text-white/65">Buy direct or marketplace</dd>
                    </div>
                </dl>
            </div>
        </div>
    </section>

    <section class="bg-[#061522] px-5 py-4 text-white sm:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="grid gap-3 border-y border-white/10 py-4 text-sm font-black md:grid-cols-3">
                <div class="flex items-center gap-3 text-white/80"><span class="text-c3d-orange">01</span> Stripe Payment Links for quick checkout</div>
                <div class="flex items-center gap-3 text-white/80"><span class="text-c3d-orange">02</span> Selected products also listed on Etsy</div>
                <div class="flex items-center gap-3 text-white/80"><span class="text-c3d-orange">03</span> Supplied unpainted in matte grey PLA</div>
            </div>
        </div>
    </section>

    <section id="products" class="bg-white px-5 py-12 text-c3d-ink sm:px-8">
        <div class="mx-auto max-w-7xl">
            <div class="mb-8 grid gap-8 lg:grid-cols-[0.75fr_1.25fr] lg:items-end">
                <div>
                    <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Products</p>
                    <h2 class="text-4xl font-black leading-tight sm:text-5xl">Terrain Essentials range.</h2>
                </div>
                <div class="flex flex-wrap gap-2 lg:justify-end">
                @foreach ($productsByCategory->keys() as $category)
                        <a href="#{{ \Illuminate\Support\Str::slug($category) }}" class="rounded-lg border border-c3d-ink/10 bg-c3d-paper px-3 py-2 text-sm font-black text-c3d-ink hover:border-c3d-teal hover:text-c3d-teal">{{ $category }}</a>
                @endforeach
                </div>
            </div>

            <div class="grid gap-12">
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
                            <article id="{{ $product->slug }}" class="group overflow-hidden rounded-lg border border-c3d-ink/10 bg-white shadow-xl shadow-c3d-ink/5">
                                @if ($product->primaryImageUrl())
                                    <div class="bg-c3d-ink p-1">
                                        <img class="aspect-[1.18] h-full w-full rounded-md object-cover transition duration-500 group-hover:scale-[1.025]" src="{{ $imageUrls[0] }}" alt="{{ $product->title }} product image">
                                    </div>
                                @else
                                    <div class="grid aspect-[1.18] place-items-center bg-c3d-paper p-6 text-center text-sm font-bold text-c3d-muted">
                                        Product images coming soon
                                    </div>
                                @endif

                                <div class="p-6">
                                    <span class="text-sm font-black text-c3d-orange">{{ $product->category }}</span>
                                    <h3 class="mt-4 text-2xl font-black">{{ $product->title }}</h3>
                                    <p class="mt-3 leading-7 text-c3d-muted">{{ $product->short_description }}</p>
                                    <div class="mt-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                        <span class="font-black">{{ $product->price ? 'GBP '.$product->price : 'Quote' }}</span>
                                        <div class="flex flex-wrap gap-2 sm:justify-end">
                                            @if ($product->hasStripePaymentLink())
                                                <a href="{{ route('product', $product) }}" class="rounded-lg bg-c3d-teal px-4 py-2 text-sm font-black text-white">View Product</a>
                                            @else
                                                <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-ink px-4 py-2 text-sm font-black text-white">Enquire</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @empty
                <p class="rounded-lg border border-c3d-ink/10 bg-c3d-paper p-6 text-c3d-muted">Products are being prepared. Custom enquiries are open now.</p>
            @endforelse
            </div>
        </div>
    </section>

    <section class="bg-[#061522] px-5 py-14 text-white sm:px-8">
        <div class="mx-auto grid max-w-7xl gap-8 lg:grid-cols-[1.05fr_0.95fr] lg:items-center">
            <img class="aspect-[1.5] w-full rounded-lg object-cover shadow-2xl shadow-black/35" src="{{ asset('images/terrain-essentials-industrial-pipe-terrain.png') }}" alt="Terrain Essentials industrial pipe tabletop terrain set with matte grey PLA sci-fi scenery">
            <div>
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Featured direction</p>
                <h2 class="text-4xl font-black leading-tight sm:text-5xl">Industrial terrain packs are coming next.</h2>
                <p class="mt-5 leading-8 text-white/70">Pipework, tanks, broken machinery, scatter cover and objective pieces are ideal for fast tabletop upgrades: chunky, paintable and readable from across the board.</p>
                <div class="mt-6 flex flex-wrap gap-3">
                    <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-orange px-5 py-3 text-sm font-black text-c3d-ink">Request a Custom Set</a>
                    <a href="{{ route('terrain-essentials') }}" class="rounded-lg border border-white/15 px-5 py-3 text-sm font-black text-white">Learn More</a>
                </div>
            </div>
        </div>
    </section>
@endsection
