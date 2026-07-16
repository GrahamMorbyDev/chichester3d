@extends('layouts.site')

@section('content')
    <section class="bg-[#061522] text-white">
        <div class="mx-auto grid min-h-[calc(100vh-74px)] max-w-7xl items-center gap-10 px-5 py-12 sm:px-8 lg:grid-cols-[0.82fr_1.18fr]">
            <div>
                <img class="mb-8 w-full max-w-md" src="{{ asset('images/terrain-essentials-logo.png') }}" alt="C3D Terrain Essentials logo">
                <p class="mb-4 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">3D printed tabletop terrain</p>
                <h1 class="text-4xl font-black leading-tight sm:text-7xl">Matte grey PLA terrain, buildings and accessories for the tabletop.</h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-white/70">Terrain Essentials is the C3D tabletop range: sci-fi barricades, ruins, buildings, dungeon pieces, objective markers and accessories printed in matte grey PLA, ready for priming, painting and play.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('shop') }}" class="rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Shop Terrain</a>
                    <a href="{{ route('quote') }}" class="rounded-lg border border-white/20 px-5 py-4 text-sm font-black text-white">Request Custom Terrain</a>
                </div>
            </div>
            <img class="aspect-[1.45] w-full rounded-lg object-cover shadow-2xl shadow-black/35" src="{{ asset('images/terrain-essentials-promo.png') }}" alt="Sci-fi tabletop board with Terrain Essentials matte grey PLA barricades, ruins and buildings">
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
        <div class="mb-8 max-w-3xl">
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">The range</p>
            <h2 class="text-4xl font-black leading-tight sm:text-5xl">Terrain, accessories and buildings made for real game nights.</h2>
            <p class="mt-5 leading-8 text-c3d-muted">The first Terrain Essentials releases focus on durable, paintable pieces that work across fantasy roleplaying, sci-fi skirmish games, wargaming tables and other tabletop systems.</p>
        </div>
        <div class="grid gap-4 md:grid-cols-3">
            @foreach ([['Terrain', 'Barricades, scatter terrain, walls, dungeon tiles, ruins, doors, platforms and objective markers.'], ['Accessories', 'Dice trays, token holders, condition markers, base packs, movement aids and table organisers.'], ['Buildings', 'Ruined structures, sci-fi wall sections, fantasy cottages, bunkers, towers and modular facades.']] as [$title, $copy])
                <article class="rounded-lg border border-c3d-ink/10 bg-white p-6">
                    <span class="text-sm font-black text-c3d-orange">0{{ $loop->iteration }}</span>
                    <h3 class="mt-5 text-2xl font-black">{{ $title }}</h3>
                    <p class="mt-4 leading-7 text-c3d-muted">{{ $copy }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Matte grey PLA</p>
                <h2 class="text-4xl font-black leading-tight sm:text-5xl">Printed ready for paint.</h2>
                <p class="mt-5 leading-8 text-c3d-muted">Terrain Essentials pieces are printed in matte grey PLA, giving a neutral base that is easy to prime, drybrush, weather and finish for the table.</p>
                <p class="mt-4 leading-8 text-c3d-muted">PLA is a plant-based thermoplastic commonly made from fermented plant starches such as corn or sugar cane. It is a lower-impact material choice than many oil-based plastics and can be commercially compostable under the right industrial conditions, though printed parts should be treated as durable hobby items rather than normal garden or food waste.</p>
            </div>
            <div class="grid gap-3 sm:grid-cols-2">
                @foreach (['Matte grey finish', 'Easy to prime and paint', 'PLA printed on Bambu P1S', 'Chunky FDM-friendly detail', 'Suitable for 28-32mm tables', 'Designed for regular play'] as $point)
                    <div class="rounded-lg border border-c3d-ink/10 bg-c3d-paper p-5 font-bold">{{ $point }}</div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[1fr_0.92fr] lg:items-center">
        <div>
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">For popular tabletop systems</p>
            <h2 class="text-4xl font-black leading-tight sm:text-5xl">Built for D&amp;D-style adventures, wargaming tables and sci-fi skirmishes.</h2>
            <p class="mt-5 leading-8 text-c3d-muted">Use Terrain Essentials for fantasy RPG encounters, Dungeons &amp; Dragons-style campaigns, Games Workshop-style wargaming layouts, sci-fi boards, skirmish tables, club nights and display setups.</p>
            <p class="mt-4 text-sm leading-7 text-c3d-muted">Terrain Essentials is an independent C3D product line. It is not affiliated with, endorsed by or sponsored by Wizards of the Coast, Dungeons &amp; Dragons, Games Workshop or any other tabletop publisher.</p>
        </div>
        <div class="rounded-lg bg-[#061522] p-6 text-white">
            <p class="text-xs font-black uppercase tracking-[0.08em] text-c3d-orange">Where to buy</p>
            <h3 class="mt-4 text-3xl font-black">Sold through the C3D store and Etsy.</h3>
            <p class="mt-4 leading-8 text-white/70">C3D store listings will sit alongside selected Etsy products as the Terrain Essentials range grows. Local custom terrain enquiries can still come through the quote form.</p>
            <div class="mt-6 flex flex-wrap gap-3">
                <a href="{{ route('shop') }}" class="rounded-lg bg-c3d-teal px-5 py-3 text-sm font-black text-white">Open C3D Store</a>
                <span class="rounded-lg border border-white/15 px-5 py-3 text-sm font-black text-white/80">Etsy listings coming soon</span>
            </div>
        </div>
    </section>

    <section class="bg-[#061522] text-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-5 py-14 sm:px-8 lg:grid-cols-[1fr_0.8fr] lg:items-center">
            <div>
                <h2 class="text-4xl font-black">Want a custom board piece or club batch?</h2>
                <p class="mt-4 max-w-2xl leading-8 text-white/70">Send the idea, scale, quantity and table use. C3D can quote terrain packs, club orders, buildings, objective sets and campaign accessories.</p>
            </div>
            <a href="{{ route('quote') }}" class="inline-flex justify-center rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Request Custom Terrain</a>
        </div>
    </section>
@endsection
