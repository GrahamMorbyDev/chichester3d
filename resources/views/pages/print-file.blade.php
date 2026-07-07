@extends('layouts.site')

@section('content')
    <section class="mx-auto max-w-7xl px-5 py-12 sm:px-8">
        <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
            <div>
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Print My File</p>
                <h1 class="text-4xl font-black leading-tight sm:text-7xl">Upload your model. We check it, print it, and get it ready.</h1>
                <p class="mt-5 max-w-2xl leading-8 text-c3d-muted">Send STL, 3MF, STEP or OBJ files with your quantity, colour preference and notes. We review the model before quoting, so awkward parts and practical details are caught early.</p>
            </div>
            <img class="aspect-[1.35] w-full rounded-lg object-cover shadow-2xl shadow-c3d-ink/10" src="{{ asset('images/print-my-file-workflow.png') }}" alt="Bambu P1S style 3D printer with AMS style filament unit, a 3D file preview, and a finished printed part ready for collection">
        </div>

        <div class="mt-10 grid gap-4 md:grid-cols-3">
            @foreach ([['Accepted files', 'STL, 3MF, STEP, STP and OBJ files are supported for quote review.'], ['PLA focused', 'Bambu P1S printers with AMS-style multicolour PLA capability.'], ['Practical review', 'We check printability, orientation, quantity and finish before quoting.']] as [$title, $copy])
                <article class="rounded-lg border border-c3d-ink/10 bg-white p-5">
                    <h2 class="text-lg font-black">{{ $title }}</h2>
                    <p class="mt-3 leading-7 text-c3d-muted">{{ $copy }}</p>
                </article>
            @endforeach
        </div>

        <div class="mt-12 grid gap-10 lg:grid-cols-[0.75fr_1.25fr]">
            <div>
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-orange">Request a quote</p>
                <h2 class="text-3xl font-black leading-tight sm:text-4xl">Tell us what the file is for.</h2>
                <p class="mt-4 leading-8 text-c3d-muted">The more context you give us, the better we can advise on strength, colour, finish and turnaround.</p>
            </div>
            <x-quote-form />
        </div>
    </section>
@endsection
