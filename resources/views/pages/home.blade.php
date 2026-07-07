@extends('layouts.site')

@section('content')
    <section class="bg-[linear-gradient(135deg,rgba(15,143,138,0.10),rgba(232,111,45,0.08))]">
        <div class="mx-auto grid min-h-[calc(100vh-74px)] max-w-7xl items-center gap-10 px-5 py-12 sm:px-8 lg:grid-cols-[0.92fr_1.08fr] lg:py-16">
            <div>
                <p class="mb-4 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Local short-run 3D printing</p>
                <h1 class="max-w-4xl text-4xl font-black leading-[0.98] tracking-normal text-c3d-ink sm:text-7xl lg:text-8xl">Local 3D Printing in Chichester</h1>
                <p class="mt-6 max-w-2xl text-lg leading-8 text-c3d-muted">Small-run printing, prototypes, replacement parts and custom design for homes, makers and businesses across West Sussex and Hampshire.</p>
                <div class="mt-8 flex flex-wrap gap-3">
                    <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-teal px-5 py-4 text-sm font-black text-white">Request a Quote</a>
                    <a href="{{ route('print-file') }}" class="rounded-lg border border-c3d-ink/15 bg-white/70 px-5 py-4 text-sm font-black">Upload a File</a>
                </div>
                <dl class="mt-8 grid gap-3 sm:grid-cols-3">
                    <div class="rounded-lg border border-c3d-ink/10 bg-white/75 p-4"><dt class="font-black">Bambu P1S</dt><dd class="mt-1 text-sm text-c3d-muted">AMS multicolour PLA</dd></div>
                    <div class="rounded-lg border border-c3d-ink/10 bg-white/75 p-4"><dt class="font-black">1-100</dt><dd class="mt-1 text-sm text-c3d-muted">part jobs welcome</dd></div>
                    <div class="rounded-lg border border-c3d-ink/10 bg-white/75 p-4"><dt class="font-black">Local</dt><dd class="mt-1 text-sm text-c3d-muted">collection or delivery</dd></div>
                </dl>
            </div>
            <img class="aspect-[1.08] w-full rounded-lg object-cover shadow-2xl shadow-c3d-ink/15" src="{{ asset('images/bambu-p1s-ams-hero.png') }}" alt="Bambu P1S style enclosed 3D printer with AMS style multicolour PLA filament system in a clean workshop">
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
        <div class="grid gap-4 md:grid-cols-3">
            @foreach ([['Print My File', 'Upload STL, 3MF, STEP or OBJ files and choose quantity, material and colour.'], ['Design & Print', 'Send photos, measurements or a rough idea and we will advise what can be modelled.'], ['Small Batch Runs', 'Useful short runs for brackets, cases, jigs, mounts, samples and display stands.']] as [$title, $copy])
                <article class="rounded-lg border border-c3d-ink/10 bg-white p-6">
                    <span class="text-sm font-black text-c3d-orange">0{{ $loop->iteration }}</span>
                    <h2 class="mt-5 text-xl font-black">{{ $title }}</h2>
                    <p class="mt-3 leading-7 text-c3d-muted">{{ $copy }}</p>
                </article>
            @endforeach
        </div>
    </section>

    <section class="bg-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[0.9fr_1.1fr]">
            <div>
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Why C3D</p>
                <h2 class="text-4xl font-black leading-tight sm:text-5xl">Practical problem solving from a small digital workshop.</h2>
                <p class="mt-5 leading-8 text-c3d-muted">Need something printed, prototyped or replaced? We help local people turn ideas and broken parts into real objects.</p>
            </div>
            <div class="grid gap-3 sm:grid-cols-2">
                @foreach (['Local service', 'Small runs welcome', 'Practical problem solving', 'Clear communication', 'Quality checked before dispatch', 'Collection or delivery options'] as $point)
                    <div class="rounded-lg border border-c3d-ink/10 bg-c3d-paper p-5 font-bold">{{ $point }}</div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
        <div class="mb-8 flex flex-col gap-3 md:flex-row md:items-end md:justify-between">
            <div>
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Common jobs</p>
                <h2 class="text-4xl font-black">Useful parts, not novelty clutter.</h2>
            </div>
            <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-ink px-5 py-3 text-sm font-black text-white">Ask what is possible</a>
        </div>
        <div class="grid gap-3 sm:grid-cols-2 lg:grid-cols-4">
            @foreach (['Replacement plastic parts', 'Product prototypes', 'Desk accessories', 'Garden and pond fittings', 'Sensor housings', 'Brackets and mounts', 'Hobby and craft prints', 'Small business display items'] as $useCase)
                <div class="rounded-lg border border-c3d-ink/10 bg-white p-4 font-bold">{{ $useCase }}</div>
            @endforeach
        </div>
    </section>

    <section class="bg-c3d-ink text-white">
        <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
            <h2 class="text-4xl font-black">How it works</h2>
            <div class="mt-8 grid gap-3 md:grid-cols-4">
                @foreach (['Tell us what you need', 'Upload a file or photos', 'We review and quote', 'We print, check and arrange collection'] as $step)
                    <article class="rounded-lg border border-white/10 bg-white/5 p-5">
                        <span class="text-sm font-black text-c3d-orange">Step {{ $loop->iteration }}</span>
                        <h3 class="mt-4 text-lg font-black">{{ $step }}</h3>
                    </article>
                @endforeach
            </div>
            <div class="mt-10 rounded-lg bg-white p-6 text-c3d-ink md:flex md:items-center md:justify-between">
                <p class="text-2xl font-black">Have an idea or broken part? Send it over and we will tell you what is possible.</p>
                <a href="{{ route('quote') }}" class="mt-5 inline-flex rounded-lg bg-c3d-teal px-5 py-3 text-sm font-black text-white md:mt-0">Request a Quote</a>
            </div>
        </div>
    </section>
@endsection
