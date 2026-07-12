@extends('layouts.site')

@section('content')
    <section class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[0.92fr_1.08fr] lg:items-center">
        <div>
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Custom tabletop miniatures</p>
            <h1 class="text-4xl font-black leading-tight sm:text-7xl">PLA prints for tabletop games, terrain and campaign bits.</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-c3d-muted">C3D prints tabletop gaming pieces for local players around Chichester: terrain, dungeon tiles, bases, objective markers, tokens, accessories and chunky custom pieces.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-teal px-5 py-4 text-sm font-black text-white">Request a Gaming Quote</a>
                <a href="{{ route('print-file') }}" class="rounded-lg border border-c3d-ink/15 bg-white px-5 py-4 text-sm font-black">Upload a Model File</a>
            </div>
        </div>
        <img class="aspect-[1.55] w-full rounded-lg object-cover shadow-2xl shadow-c3d-ink/10" src="{{ asset('images/tabletop-miniatures-pla.png') }}" alt="PLA printed tabletop gaming terrain, bases, tokens and miniature pieces beside a Bambu P1S style 3D printer">
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
            <div class="mb-8 max-w-3xl">
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Good tabletop jobs</p>
                <h2 class="text-4xl font-black leading-tight sm:text-5xl">Useful pieces for the table, not mass-produced clutter.</h2>
                <p class="mt-5 leading-8 text-c3d-muted">PLA FDM printing is especially useful for gaming terrain, organisers, bases, tokens and durable campaign accessories. For ultra-fine display miniatures, resin is often the better process, so C3D will be clear about what is realistic before quoting.</p>
            </div>
            <div class="grid gap-4 md:grid-cols-3">
                @foreach ([['Terrain & tiles', 'Dungeon walls, scatter terrain, ruins, platforms, doors, floors and modular table pieces.'], ['Bases & markers', 'Miniature bases, objective markers, condition rings, wound counters and tokens in multiple colours.'], ['Campaign accessories', 'Card trays, dice holders, storage inserts, initiative trackers and custom table tools.']] as [$title, $copy])
                    <article class="rounded-lg border border-c3d-ink/10 bg-c3d-paper p-6">
                        <h3 class="text-2xl font-black">{{ $title }}</h3>
                        <p class="mt-4 leading-7 text-c3d-muted">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-8 px-5 py-14 sm:px-8 lg:grid-cols-[0.8fr_1.2fr]">
        <div>
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">How to order</p>
            <h2 class="text-4xl font-black leading-tight">Send the model, licence details and table use.</h2>
            <p class="mt-5 leading-8 text-c3d-muted">If you have a file, include it with quantity, scale, colour preference and whether the piece needs to survive regular play. If the model is from a designer, only send files you are allowed to have printed.</p>
        </div>
        <div class="grid gap-3 sm:grid-cols-2">
            @foreach (['STL, 3MF, STEP or OBJ files', '28mm, 32mm or custom scale notes', 'Single pieces or small party sets', 'PLA colour options with AMS', 'Terrain and gaming accessories', 'Local Chichester collection'] as $point)
                <div class="rounded-lg border border-c3d-ink/10 bg-white p-5 font-bold">{{ $point }}</div>
            @endforeach
        </div>
    </section>

    <section class="bg-c3d-ink text-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-5 py-14 sm:px-8 lg:grid-cols-[1fr_0.8fr] lg:items-center">
            <div>
                <h2 class="text-4xl font-black">Building a table, party or campaign set?</h2>
                <p class="mt-4 max-w-2xl leading-8 text-white/70">Send the files or idea and C3D will review the print time, scale, colour, strength and surface detail before quoting.</p>
            </div>
            <a href="{{ route('quote') }}" class="inline-flex justify-center rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Start a Tabletop Quote</a>
        </div>
    </section>
@endsection
