@extends('layouts.site')

@section('content')
    <section class="mx-auto grid max-w-7xl gap-10 px-5 py-14 sm:px-8 lg:grid-cols-[0.9fr_1.1fr]">
        <div>
            <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">About C3D</p>
            <h1 class="text-4xl font-black leading-tight sm:text-7xl">A small digital workshop for practical local printing.</h1>
        </div>
        <div class="space-y-5 text-lg leading-8 text-c3d-muted">
            <p>Chichester 3D Printing.com is a local 3D printing service for homes, makers, small businesses and practical problem-solvers across Chichester, West Sussex, Hampshire and nearby areas.</p>
            <p>We print customer files, help design and print custom parts, and produce small batches of useful components such as replacement plastic parts, prototypes, brackets, mounts, garden fittings, sensor housings, hobby pieces and display items.</p>
            <p>Every job starts with a quick review. Send a 3D file, photo, sketch or description, and we will check what is possible, advise on material, colour and finish, then provide a clear quote before printing begins.</p>
            <a href="{{ route('quote') }}" class="inline-flex rounded-lg bg-c3d-teal px-5 py-3 text-sm font-black text-white">Start a request</a>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-5 pb-14 sm:px-8">
        <div class="grid gap-6 lg:grid-cols-[1.2fr_0.8fr] lg:items-stretch">
            <img class="aspect-[1.55] w-full rounded-lg object-cover shadow-2xl shadow-c3d-ink/10" src="{{ asset('images/about-workshop.png') }}" alt="Tidy local 3D printing workshop with Bambu P1S style printer, AMS style filament unit, sample printed parts and measuring tools">
            <div class="rounded-lg border border-c3d-ink/10 bg-white p-6">
                <p class="text-xs font-black uppercase tracking-[0.08em] text-c3d-orange">Workshop approach</p>
                <h2 class="mt-4 text-2xl font-black">Useful parts, checked properly.</h2>
                <p class="mt-4 leading-7 text-c3d-muted">C3D is set up for practical local work: clean PLA prints, sensible advice, measured parts, and clear communication before anything goes on the printer.</p>
            </div>
        </div>
    </section>
@endsection
