@extends('layouts.site')

@section('content')
    <section class="mx-auto max-w-7xl px-5 py-14 sm:px-8">
        <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Services</p>
        <h1 class="max-w-4xl text-4xl font-black leading-tight sm:text-7xl">Short-run 3D printing for local, practical jobs.</h1>
        <div class="mt-10 grid gap-6 lg:grid-cols-[1.15fr_0.85fr] lg:items-end">
            <img class="aspect-[1.55] w-full rounded-lg object-cover shadow-2xl shadow-c3d-ink/10" src="{{ asset('images/services-pipework-job.png') }}" alt="Bambu P1S style 3D printer with AMS style filament unit and completed printed pipework parts beside a job order sheet">
            <div class="rounded-lg border border-c3d-ink/10 bg-white p-6">
                <p class="text-xs font-black uppercase tracking-[0.08em] text-c3d-orange">Example job</p>
                <h2 class="mt-4 text-2xl font-black">Finished parts, checked before collection.</h2>
                <p class="mt-4 leading-7 text-c3d-muted">From practical pipe clips and fittings to prototype brackets, we treat each small job like a real workshop order: review, print, check, then hand over cleanly.</p>
            </div>
        </div>
        <div class="mt-10 grid gap-4 md:grid-cols-3">
            @foreach ([['Print My File', 'Upload a model and tell us quantity, colour and material preference.'], ['Design & Print', 'Describe the part, upload photos, add measurements and get practical advice.'], ['Small Batch Printing', 'Runs from 5 to 100 items for trials, jigs, mounts, brackets and samples.']] as [$title, $copy])
                <article class="rounded-lg border border-c3d-ink/10 bg-white p-6">
                    <h2 class="text-2xl font-black">{{ $title }}</h2>
                    <p class="mt-4 leading-7 text-c3d-muted">{{ $copy }}</p>
                    <a href="{{ route('quote') }}" class="mt-6 inline-flex rounded-lg bg-c3d-ink px-4 py-3 text-sm font-black text-white">Request this</a>
                </article>
            @endforeach
        </div>
    </section>
@endsection
