@extends('layouts.site')

@section('content')
    <section class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[0.95fr_1.05fr] lg:items-center">
        <div>
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">3D printing & prototyping Sussex</p>
            <h1 class="text-4xl font-black leading-tight sm:text-7xl">Local prototype prints without the production run drama.</h1>
            <p class="mt-6 max-w-2xl text-lg leading-8 text-c3d-muted">C3D prints useful PLA prototypes, replacement parts and short-run pieces for customers around Chichester, West Sussex, Hampshire and nearby areas.</p>
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="{{ route('quote') }}" class="rounded-lg bg-c3d-teal px-5 py-4 text-sm font-black text-white">Request a Quote</a>
                <a href="{{ route('print-file') }}" class="rounded-lg border border-c3d-ink/15 bg-white px-5 py-4 text-sm font-black">Upload a File</a>
            </div>
        </div>
        <img class="aspect-[1.2] w-full rounded-lg object-cover shadow-2xl shadow-c3d-ink/10" src="{{ asset('images/services-pipework-job.png') }}" alt="Bambu P1S style 3D printer with finished prototype pipework parts and a job order sheet">
    </section>

    <section class="bg-white">
        <div class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
            <div class="mb-8 max-w-3xl">
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">What this is good for</p>
                <h2 class="text-4xl font-black leading-tight sm:text-5xl">A practical route from idea to printed part.</h2>
            </div>
            <div class="grid gap-4 md:grid-cols-3">
                @foreach ([['Prototype parts', 'Check fit, shape and handling before committing to a final design or larger order.'], ['Replacement pieces', 'Brackets, clips, covers, mounts and plastic parts that are awkward to buy off the shelf.'], ['Small business samples', 'Short runs for displays, fixtures, packaging trials, product demos and workshop tools.']] as [$title, $copy])
                    <article class="rounded-lg border border-c3d-ink/10 bg-c3d-paper p-6">
                        <h3 class="text-2xl font-black">{{ $title }}</h3>
                        <p class="mt-4 leading-7 text-c3d-muted">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="mx-auto grid max-w-7xl gap-8 px-5 py-14 sm:px-8 lg:grid-cols-[0.85fr_1.15fr]">
        <div>
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Local coverage</p>
            <h2 class="text-4xl font-black leading-tight">Serving Chichester, Sussex and nearby Hampshire.</h2>
            <p class="mt-5 leading-8 text-c3d-muted">The focus is local, low-volume work where communication matters: one part, a handful of prototypes, or a small repeatable batch.</p>
        </div>
        <div class="grid gap-3 sm:grid-cols-2">
            @foreach (['Chichester', 'West Sussex', 'Hampshire', 'Prototype printing', 'PLA replacement parts', 'Short-run production', 'Bambu P1S printing', 'AMS multicolour PLA'] as $point)
                <div class="rounded-lg border border-c3d-ink/10 bg-white p-5 font-bold">{{ $point }}</div>
            @endforeach
        </div>
    </section>

    <section class="bg-c3d-ink text-white">
        <div class="mx-auto grid max-w-7xl gap-8 px-5 py-14 sm:px-8 lg:grid-cols-[1fr_0.8fr] lg:items-center">
            <div>
                <h2 class="text-4xl font-black">Send the file, photo or problem.</h2>
                <p class="mt-4 max-w-2xl leading-8 text-white/70">If it can be reviewed sensibly for PLA printing, C3D will quote it before printing. If it needs changes, you will know early.</p>
            </div>
            <a href="{{ route('quote') }}" class="inline-flex justify-center rounded-lg bg-c3d-orange px-5 py-4 text-sm font-black text-c3d-ink">Start a Prototype Quote</a>
        </div>
    </section>
@endsection
