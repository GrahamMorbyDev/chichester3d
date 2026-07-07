@extends('layouts.site')

@section('content')
    <section class="mx-auto max-w-7xl px-5 py-12 sm:px-8">
        <div class="grid gap-10 lg:grid-cols-[0.9fr_1.1fr] lg:items-center">
            <div>
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-teal">Small Batch Printing</p>
                <h1 class="text-4xl font-black leading-tight sm:text-7xl">Short runs of practical parts, printed cleanly and consistently.</h1>
                <p class="mt-5 max-w-2xl leading-8 text-c3d-muted">For batches of 5-100 parts: brackets, clips, mounts, jigs, samples, display items and low-volume product trials. We check the job before printing so repeat parts stay useful and consistent.</p>
            </div>
            <img class="aspect-[1.35] w-full rounded-lg object-cover shadow-2xl shadow-c3d-ink/10" src="{{ asset('images/small-batch-run.png') }}" alt="Small batch of identical PLA printed parts arranged neatly with a Bambu P1S style printer and AMS style filament unit in a tidy workshop">
        </div>

        <div class="mt-10 grid gap-4 md:grid-cols-3">
            @foreach ([['Batch sizes', 'Useful for 5-100 part runs where large print farms are overkill.'], ['Consistent output', 'Parts are reviewed for orientation, finish, strength and repeatability.'], ['Local handover', 'Collect around Chichester or discuss delivery options when requesting a quote.']] as [$title, $copy])
                <article class="rounded-lg border border-c3d-ink/10 bg-white p-5">
                    <h2 class="text-lg font-black">{{ $title }}</h2>
                    <p class="mt-3 leading-7 text-c3d-muted">{{ $copy }}</p>
                </article>
            @endforeach
        </div>

        <div class="mt-12 grid gap-10 lg:grid-cols-[0.75fr_1.25fr]">
            <div>
                <p class="mb-3 text-xs font-black uppercase tracking-[0.08em] text-c3d-orange">Batch quote</p>
                <h2 class="text-3xl font-black leading-tight sm:text-4xl">Tell us quantity, use case and finish requirements.</h2>
                <p class="mt-4 leading-8 text-c3d-muted">If you already have a file, upload it. If not, describe the part and add photos or measurements so we can advise on design and printability.</p>
            </div>
            <x-quote-form />
        </div>
    </section>
@endsection
