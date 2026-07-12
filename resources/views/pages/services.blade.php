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

        <section class="mt-14 rounded-lg bg-c3d-ink p-6 text-white sm:p-8">
            <div class="grid gap-8 lg:grid-cols-[0.9fr_1.1fr] lg:items-end">
                <div>
                    <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Local search help</p>
                    <h2 class="text-3xl font-black leading-tight sm:text-4xl">Trying to work out if 3D printing is right for your job?</h2>
                    <p class="mt-4 leading-8 text-white/70">Some customers arrive with a finished file. Others only have a broken part, photo or rough idea. Both are fine: C3D can review the job and tell you what is realistic before you spend money.</p>
                </div>
                <div class="grid gap-3 sm:grid-cols-3">
                    <a class="rounded-lg border border-white/10 bg-white/5 p-5 transition hover:bg-white/10" href="{{ route('sussex-prototyping') }}">
                        <h3 class="font-black">3D printing & prototyping Sussex</h3>
                        <p class="mt-2 text-sm leading-6 text-white/65">Local prototypes, replacement parts and useful short-run PLA prints.</p>
                    </a>
                    <a class="rounded-lg border border-white/10 bg-white/5 p-5 transition hover:bg-white/10" href="{{ route('beginners') }}">
                        <h3 class="font-black">Beginner 3D printing help</h3>
                        <p class="mt-2 text-sm leading-6 text-white/65">A clear first step if you are searching for clubs, courses or local advice.</p>
                    </a>
                    <a class="rounded-lg border border-white/10 bg-white/5 p-5 transition hover:bg-white/10" href="{{ route('tabletop-miniatures') }}">
                        <h3 class="font-black">Tabletop miniatures & terrain</h3>
                        <p class="mt-2 text-sm leading-6 text-white/65">Gaming terrain, bases, tokens and accessories printed in PLA.</p>
                    </a>
                </div>
            </div>
        </section>
    </section>
@endsection
